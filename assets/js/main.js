/**
 * Student Portfolio Interactive Engine - John Senen Estrella
 * 
 * Features:
 * 1. Top header theme switching (Dark/Light with localStorage persistence)
 * 2. Collapsible sidebar rail (desktop toggle with localStorage & keyboard shortcut Ctrl+B)
 * 3. Mobile sidebar drawer with overlay & escape key handler
 * 4. Section scroll spy updating active 01-06 indicators
 * 5. Interactive Student Terminal with clickable chips and executable commands
 * 6. Dynamic coursework filtering by discipline
 * 7. Dual-mode project card view (Overview vs Retrospective / What Broke)
 * 8. Accessible resume modal dialog with focus trap
 */

// Force browser to disable automatic scroll restoration so page opens cleanly at (0, 0)
if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
}

// Clear any accidental URL fragment (#intro) on initial load so mobile browsers
// don't natively jump past the sticky header to the section container
if (window.location.hash === '#intro') {
    try {
        history.replaceState(null, '', window.location.pathname + window.location.search);
    } catch (_) {}
}

// Immediately reset scroll position before DOM is fully rendered
window.scrollTo(0, 0);
if (document.documentElement) document.documentElement.scrollTop = 0;
if (document.body) document.body.scrollTop = 0;

document.addEventListener('DOMContentLoaded', () => {
    initWelcomeScreen();
    initInteractiveTutorial();
    initTheme();
    initSidebarCollapse();
    initMobileDrawer();
    initSpaRouter();
    initCourseworkFilters();
    initProjectTabs();
    initResumeModal();
    initTouchGestures();
});

/**
 * 0. Clean & Simple Welcome Loading Screen
 */
function initWelcomeScreen() {
    const welcomeScreen = document.getElementById('welcomeScreen');
    if (!welcomeScreen) return;

    const skipBtn = document.getElementById('welcomeSkipBtn');
    const statusText = document.getElementById('welcomeStatusText');
    const percentText = document.getElementById('welcomePercent');
    const progressFill = document.getElementById('welcomeProgressFill');
    const typewriterText = document.getElementById('typewriterText');
    const typewriterCursor = document.getElementById('typewriterCursor');
    const typewriterLead = document.getElementById('typewriterLeadText');
    const typewriterLeadCursor = document.getElementById('typewriterLeadCursor');

    const header = document.getElementById('siteHeader');
    const sidebar = document.getElementById('siteSidebar');
    const content = document.getElementById('mainContent');
    const mobileNav = document.getElementById('mobileBottomNav');

    const fullHeadline = 'Building web systems, database architectures, and IT solutions.';
    const fullLeadText = "Hi, I'm John Senen Estrella. I'm a 3rd year college student taking Bachelor of Science in Information Technology (BSIT) at National University (NU) Baliwag. This is my student portfolio: a place where I document coursework, projects, and the skills I'm developing along the way.";

    let hasDismissed = false;
    let isFullyCompleted = false;
    let activeAnimFrame = null;
    let activeStageTimeout = null;
    let typeTimer = null;

    // Clear any previous session cache so welcome screen consistently displays
    try {
        sessionStorage.removeItem('portfolio-welcome-seen');
    } catch (_) {}

    // Immediately lock page scroll while welcome card is present and pin to top
    document.body.classList.add('welcome-locked');
    window.scrollTo(0, 0);
    document.documentElement.scrollTop = 0;
    document.body.scrollTop = 0;

    // Ensure elements start hidden off-screen for staged entrance
    if (header) header.classList.add('staged-hidden');
    if (sidebar) sidebar.classList.add('staged-hidden');
    if (content) content.classList.add('staged-hidden');
    if (mobileNav) mobileNav.classList.add('staged-hidden');

    // Clear texts initially so they start blank for typing
    if (typewriterText) typewriterText.textContent = '';
    if (typewriterCursor) typewriterCursor.classList.remove('is-hidden');
    if (typewriterLead) typewriterLead.textContent = '';
    if (typewriterLeadCursor) typewriterLeadCursor.classList.add('is-hidden');

    // Staged loading progression with faster, crisp pauses (~0.5s - 0.6s per gap)
    const STAGES = [
        {
            from: 0,
            to: 28,
            duration: 320,
            status: 'Initializing system runtime & cache...',
            pauseDuration: 550, // snappy pause ~0.55s
            pauseStatus: 'Resolving architecture & local modules...'
        },
        {
            from: 28,
            to: 60,
            duration: 360,
            status: 'Loading coursework, projects & assets...',
            pauseDuration: 600, // snappy pause ~0.60s
            pauseStatus: 'Compiling student database schemas & lab notes...'
        },
        {
            from: 60,
            to: 88,
            duration: 320,
            status: 'Constructing UI/UX layouts & components...',
            pauseDuration: 500, // snappy pause ~0.50s
            pauseStatus: 'Finalizing interface components...'
        },
        {
            from: 88,
            to: 100,
            duration: 220,
            status: 'Mounting portfolio interface...',
            pauseDuration: 180, // brief settle hold at 100%
            pauseStatus: 'Ready'
        }
    ];

    function setPercent(pct, text) {
        const clamped = Math.min(100, Math.max(0, pct));
        if (percentText) percentText.textContent = `${Math.floor(clamped)}%`;
        if (progressFill) progressFill.style.width = `${clamped}%`;
        if (statusText && text) statusText.textContent = text;
    }

    function runStage(stageIndex) {
        if (hasDismissed) return;
        if (stageIndex >= STAGES.length) {
            dismissWelcome();
            return;
        }

        const stage = STAGES[stageIndex];
        const startTime = performance.now();

        function step(now) {
            if (hasDismissed) return;
            const elapsed = now - startTime;
            const progress = Math.min(elapsed / stage.duration, 1);
            // Ease out quad
            const eased = 1 - (1 - progress) * (1 - progress);
            const currentPct = stage.from + (stage.to - stage.from) * eased;

            setPercent(currentPct, stage.status);

            if (progress < 1) {
                activeAnimFrame = requestAnimationFrame(step);
            } else {
                // Reached target percentage of this stage
                setPercent(stage.to, stage.pauseStatus);

                // REAL GAP / STOP: Halt for ~1 second!
                activeStageTimeout = setTimeout(() => {
                    if (hasDismissed) return;
                    runStage(stageIndex + 1);
                }, stage.pauseDuration);
            }
        }

        activeAnimFrame = requestAnimationFrame(step);
    }

    // Sequential pull-in of UI components ONE BY ONE and ONE AT A TIME
    function runSequentialComponentPullIn(onComplete) {
        if (isFullyCompleted) return;

        // Ensure viewport is pinned to (0, 0) before components enter
        window.scrollTo({ top: 0, left: 0, behavior: 'instant' });
        document.documentElement.scrollTop = 0;
        document.body.scrollTop = 0;

        const isReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (isReduced) {
            if (header) { header.classList.remove('staged-hidden'); header.classList.add('staged-enter'); }
            if (sidebar) { sidebar.classList.remove('staged-hidden'); sidebar.classList.add('staged-enter'); }
            if (content) { content.classList.remove('staged-hidden'); content.classList.add('staged-enter'); }
            if (mobileNav) { mobileNav.classList.remove('staged-hidden'); mobileNav.classList.add('staged-enter'); }
            if (typeof onComplete === 'function') onComplete();
            return;
        }

        // STEP 1: Top Header pulls in slowly from top (~950ms transition)
        if (header) {
            header.classList.remove('staged-hidden');
            void header.offsetHeight; // Force reflow
            header.classList.add('staged-enter');
        }

        activeStageTimeout = setTimeout(() => {
            if (isFullyCompleted) return;

            // STEP 2: Left Sidebar (Desktop) and Floating Dock (Mobile) pull in slowly (~1450ms / ~950ms transition)
            if (sidebar) {
                sidebar.classList.remove('staged-hidden');
                void sidebar.offsetHeight; // Force reflow
                sidebar.classList.add('staged-enter');
            }
            if (mobileNav) {
                mobileNav.classList.remove('staged-hidden');
                mobileNav.classList.add('staged-enter');
                updateMobileGlassIndicator(false);
            }

            activeStageTimeout = setTimeout(() => {
                if (isFullyCompleted) return;

                // STEP 3: Main Portfolio Content pulls in slowly from below (~1050ms transition)
                if (content) {
                    content.classList.remove('staged-hidden');
                    void content.offsetHeight; // Force reflow
                    content.classList.add('staged-enter');

                    // If user refreshed on #projects or #contact, re-trigger section cascade
                    const activeSection = document.querySelector('.content-section.spa-active');
                    if (activeSection && activeSection.id !== 'intro') {
                        activeSection.classList.remove('spa-active');
                        void activeSection.offsetHeight; // Force reflow to replay entrance animations
                        activeSection.classList.add('spa-active');
                    }
                }

                activeStageTimeout = setTimeout(() => {
                    if (isFullyCompleted) return;

                    // All UI components and layout blocks are fully seated and loaded!
                    if (typeof onComplete === 'function') {
                        onComplete();
                    }
                }, 1450); // Allow ample 1450ms for profile header, milestone cards, and terminal to cascade in
            }, 1550); // Generous 1550ms wait so the slow sidebar/mobile dock pull-out is fully watched
        }, 1000);
    }

    // Slow typing of texts ONE AT A TIME ONLY once UI components have finished pulling in
    function startSequentialTextTyping(onComplete) {
        if (isFullyCompleted) return;

        const introSection = document.getElementById('intro');
        const isIntroActive = introSection && introSection.classList.contains('spa-active');

        const isReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (isReduced || !isIntroActive) {
            if (typewriterText) typewriterText.textContent = fullHeadline;
            if (typewriterCursor) typewriterCursor.classList.add('is-hidden');
            if (typewriterLead) typewriterLead.textContent = fullLeadText;
            if (typewriterLeadCursor) typewriterLeadCursor.classList.add('is-hidden');
            const introSub = document.getElementById('introSubtext');
            if (introSub) {
                introSub.classList.remove('staged-subtext-hidden');
                introSub.classList.add('staged-subtext-visible');
            }
            if (typeof onComplete === 'function') onComplete();
            return;
        }

        // TEXT 1: Hero Headline typing
        let hIndex = 0;
        if (typewriterText) typewriterText.textContent = '';
        if (typewriterCursor) typewriterCursor.classList.remove('is-hidden');

        function typeHeadline() {
            if (isFullyCompleted) return;
            if (hIndex < fullHeadline.length) {
                if (typewriterText) {
                    typewriterText.textContent = fullHeadline.slice(0, hIndex + 1);
                }
                hIndex++;
                typeTimer = setTimeout(typeHeadline, 16);
            } else {
                // Headline typed! Brief pause, then begin Lead text typing
                typeTimer = setTimeout(() => {
                    if (typewriterCursor) typewriterCursor.classList.add('is-hidden');
                    startLeadTyping();
                }, 200);
            }
        }

        // TEXT 2: Introduction Lead text typing
        function startLeadTyping() {
            if (isFullyCompleted) return;
            if (!typewriterLead) {
                finishTyping();
                return;
            }

            let lIndex = 0;
            typewriterLead.textContent = '';
            if (typewriterLeadCursor) typewriterLeadCursor.classList.remove('is-hidden');

            function typeLead() {
                if (isFullyCompleted) return;
                if (lIndex < fullLeadText.length) {
                    typewriterLead.textContent = fullLeadText.slice(0, lIndex + 1);
                    lIndex++;
                    typeTimer = setTimeout(typeLead, 9);
                } else {
                    // Lead text typed! Brief settle, then reveal subtext
                    typeTimer = setTimeout(() => {
                        if (typewriterLeadCursor) typewriterLeadCursor.classList.add('is-hidden');
                        finishTyping();
                    }, 180);
                }
            }

            typeLead();
        }

        function finishTyping() {
            const introSub = document.getElementById('introSubtext');
            if (introSub) {
                introSub.classList.remove('staged-subtext-hidden');
                introSub.classList.add('staged-subtext-visible');
            }
            typeTimer = setTimeout(() => {
                if (typeof onComplete === 'function') {
                    onComplete();
                }
            }, 250);
        }

        // Slight 160ms breath after UI components seat into place before first char appears
        typeTimer = setTimeout(typeHeadline, 160);
    }

    function dismissWelcome() {
        if (hasDismissed) return;
        hasDismissed = true;

        if (activeAnimFrame) cancelAnimationFrame(activeAnimFrame);
        if (activeStageTimeout) clearTimeout(activeStageTimeout);

        setPercent(100, 'Ready');

        // Smooth expanding transition: card expands outward to reveal empty template
        welcomeScreen.classList.add('is-expanding');


        activeStageTimeout = setTimeout(() => {
            welcomeScreen.style.display = 'none';
            welcomeScreen.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('welcome-locked');

            // Pin viewport to top when unlock happens
            window.scrollTo({ top: 0, left: 0, behavior: 'instant' });
            document.documentElement.scrollTop = 0;
            document.body.scrollTop = 0;

            // Hold on the clean blank canvas for 500ms so the empty canvas state is clearly visible!
            activeStageTimeout = setTimeout(() => {
                // Pin scroll again right before staged components pull in
                window.scrollTo({ top: 0, left: 0, behavior: 'instant' });
                document.documentElement.scrollTop = 0;
                document.body.scrollTop = 0;

                // On the empty template shell, sequentially pull in UI components one by one, SLOWLY
                runSequentialComponentPullIn(() => {
                    // ONLY once UI components are completely finished, type out texts one at a time!
                    startSequentialTextTyping(() => {
                        // All sequential animations completed
                    });
                });
            }, 500);
        }, 750);
    }

    // Skip handler: immediately skips loading, gaps, pull-ins, and typing
    function skipAll() {
        if (isFullyCompleted) return;
        isFullyCompleted = true;
        hasDismissed = true;

        if (activeAnimFrame) cancelAnimationFrame(activeAnimFrame);
        if (activeStageTimeout) clearTimeout(activeStageTimeout);
        if (typeTimer) clearTimeout(typeTimer);


        setPercent(100, 'Ready');

        welcomeScreen.style.display = 'none';
        welcomeScreen.setAttribute('aria-hidden', 'true');
        welcomeScreen.classList.remove('is-expanding');

        document.body.classList.remove('welcome-locked');

        if (header) {
            header.classList.remove('staged-hidden');
            header.classList.add('staged-enter');
        }
        if (sidebar) {
            sidebar.classList.remove('staged-hidden');
            sidebar.classList.add('staged-enter');
        }
        if (content) {
            content.classList.remove('staged-hidden');
            content.classList.add('staged-enter');
        }
        const activeSection = document.querySelector('.content-section.spa-active');
        if (activeSection && activeSection.id !== 'intro') {
            activeSection.classList.remove('spa-active');
            void activeSection.offsetHeight;
            activeSection.classList.add('spa-active');
        }
        if (mobileNav) {
            mobileNav.classList.remove('staged-hidden');
            mobileNav.classList.add('staged-enter');
            updateMobileGlassIndicator(false);
        }

        window.scrollTo({ top: 0, left: 0, behavior: 'instant' });
        document.documentElement.scrollTop = 0;
        document.body.scrollTop = 0;

        if (typewriterText) typewriterText.textContent = fullHeadline;
        if (typewriterCursor) typewriterCursor.classList.add('is-hidden');

        if (typewriterLead) typewriterLead.textContent = fullLeadText;
        if (typewriterLeadCursor) typewriterLeadCursor.classList.add('is-hidden');

        const introSub = document.getElementById('introSubtext');
        if (introSub) {
            introSub.classList.remove('staged-subtext-hidden');
            introSub.classList.add('staged-subtext-visible');
        }

        document.removeEventListener('keydown', handleKeydown);
    }

    window.skipIntroSequence = skipAll;
    window.skipTypewriter = skipAll;

    function handleKeydown(e) {
        if (['Escape', 'Enter', ' '].includes(e.key)) {
            e.preventDefault();
            skipAll();
        }
    }
    document.addEventListener('keydown', handleKeydown);

    if (skipBtn) {
        skipBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            skipAll();
        });
    }

    welcomeScreen.addEventListener('click', () => {
        skipAll();
    });

    // Check reduced motion preference
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        setTimeout(skipAll, 100);
        return;
    }

    // Initial calm pre-loading state
    setPercent(0, 'Connecting to portfolio environment...');

    // Elegant pre-loading entrance pause:
    // Allow the welcome card to smoothly enter and settle before the progress bar begins advancing
    activeStageTimeout = setTimeout(() => {
        if (hasDismissed) return;
        runStage(0);
    }, 520);
}

/**
 * 0.1 Clean Interactive Interface Tour Spotlight Overlay
 * (Disabled for now as per user request)
 */
function initInteractiveTutorial() {
    window.launchInteractiveTutorial = () => {};
    return;

    const overlay = document.getElementById('gameTutorialOverlay');
    const spotlight = document.getElementById('tutorialSpotlight');
    const dialog = document.getElementById('tutorialDialog');
    const targetLabel = document.getElementById('spotlightTargetLabel');
    const stepText = document.getElementById('tutorialStepText');
    const iconBox = document.getElementById('tutorialIconBox');
    const titleEl = document.getElementById('tutorialTitle');
    const descEl = document.getElementById('tutorialDesc');
    const proTipText = document.getElementById('tutorialProTipText');
    const dots = document.querySelectorAll('.tutorial-dot');
    const prevBtn = document.getElementById('tutorialPrevBtn');
    const nextBtn = document.getElementById('tutorialNextBtn');
    const nextBtnText = document.getElementById('tutorialNextBtnText');
    const skipBtn = document.getElementById('tutorialSkipBtn');
    const reopenBtn = document.getElementById('hudReopenBtn');

    if (!overlay || !spotlight || !dialog) return;

    let currentStep = 0;
    let isActive = false;

    // Prevent background scrolling while the tour is active
    function preventScrollDuringTour(e) {
        if (!isActive) return;
        // Allow scrolling only inside the dialog if it has overflow
        if (e.target && e.target.closest && e.target.closest('#tutorialDialog')) {
            return;
        }
        e.preventDefault();
    }

    // Vector SVG Icons for tour steps (Strictly no emojis)
    const SVG_ICONS = {
        sidebar: `<svg class="tutorial-svg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>`,
        theme: `<svg class="tutorial-svg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>`,
        terminal: `<svg class="tutorial-svg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>`,
        navigation: `<svg class="tutorial-svg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>`
    };

    const STEPS = [
        {
            getTarget: () => document.getElementById('sidebarNavList') || document.getElementById('siteSidebar'),
            label: 'Sidebar Dock',
            icon: SVG_ICONS.sidebar,
            title: 'Sidebar Buttons & Auto-Collapse',
            desc: 'Hover over any numbered button (01–06) to expand the full section titles. Moving your cursor off the buttons onto empty sidebar space automatically collapses it into a slim rail.',
            tip: 'Buttons stay open while hovered—they never collapse while you interact with them!',
            beforeShow: () => {
                if (window.innerWidth >= 1024) {
                    document.body.classList.remove('sidebar-collapsed');
                }
            }
        },
        {
            getTarget: () => document.querySelector('.header-right') || document.getElementById('siteHeader'),
            label: 'Header Utilities',
            icon: SVG_ICONS.theme,
            title: 'Theme, Resume & Guide',
            desc: 'Toggle between Obsidian Carbon (Dark) & Monochromatic Paper (Light), download John\'s resume, or click this Compass button to replay this tour at any time.',
            tip: 'Press H on your keyboard at any time to reopen this interactive guide!',
            beforeShow: () => {}
        },
        {
            getTarget: () => document.getElementById('studentTerminal'),
            label: 'Student Terminal',
            icon: SVG_ICONS.terminal,
            title: 'Interactive Student Shell',
            desc: 'A live interactive terminal console. Click the clickable command chips above the prompt or type commands directly like whoami, status, courses, or help.',
            tip: 'Type \'help\' in the terminal prompt to reveal all student commands and academic logs!',
            beforeShow: () => {
                const introLink = document.querySelector('.sidebar-nav-link[data-section="intro"]');
                if (introLink && !introLink.classList.contains('active')) {
                    introLink.click();
                }
            }
        },
        {
            getTarget: () => document.getElementById('introStepper') || document.querySelector('.spa-view-stepper'),
            label: 'Section Navigation',
            icon: SVG_ICONS.navigation,
            title: 'Instant Keyboard Navigation',
            desc: 'The portfolio is built as an ultra-fast SPA. Seamlessly browse sections using the sidebar, or use the Left [ ← ] and Right [ → ] arrow keys on your keyboard.',
            tip: 'Press Ctrl+B or Cmd+B to toggle the sidebar rail mode anytime.',
            preferredPlacement: 'above',
            beforeShow: () => {}
        }
    ];

    function positionSpotlightAndDialog(targetEl, step) {
        if (!targetEl) return;
        const rect = targetEl.getBoundingClientRect();
        const pad = 8;
        const vw = window.innerWidth;
        const vh = window.innerHeight;

        // Position spotlight around target
        spotlight.style.top = `${Math.max(0, rect.top - pad)}px`;
        spotlight.style.left = `${Math.max(0, rect.left - pad)}px`;
        spotlight.style.width = `${rect.width + pad * 2}px`;
        spotlight.style.height = `${rect.height + pad * 2}px`;

        // Position dialog relative to target
        const dialogWidth = Math.min(420, vw - 32);
        // Dynamically measure actual dialog height to prevent any button clipping!
        const dialogHeight = dialog.getBoundingClientRect().height || dialog.offsetHeight || 310;
        let dTop = 0;
        let dLeft = 0;

        // 1. Sidebar target on the left
        if (rect.left < 300 && rect.width < 320 && vw >= 900) {
            dLeft = rect.right + 24;
            dTop = Math.max(80, Math.min(rect.top + 20, vh - dialogHeight - 24));
        }
        // 2. Header utilities on top
        else if (rect.top < 100 && rect.height < 100) {
            dLeft = Math.max(16, Math.min(rect.right - dialogWidth, vw - dialogWidth - 24));
            dTop = rect.bottom + 16;
        }
        // 3. Lower element or explicitly preferred placement above (e.g. Stepper navigation)
        else if (step?.preferredPlacement === 'above' || rect.bottom > vh * 0.58) {
            // Place ABOVE target so all footer buttons are completely visible!
            dTop = rect.top - dialogHeight - 16;
            dLeft = Math.max(16, Math.min(rect.left, vw - dialogWidth - 16));
        }
        // 4. Content targets with clearance below (e.g. studentTerminal near top)
        else {
            const spaceBelow = vh - rect.bottom;
            const spaceAbove = rect.top;

            if (spaceBelow >= dialogHeight + 20) {
                // Room below target: place below (cleanly under studentTerminal!)
                dTop = rect.bottom + 16;
                dLeft = Math.max(16, Math.min(rect.left, vw - dialogWidth - 16));
            } else if (spaceAbove >= dialogHeight + 80) {
                // Room above target: place above
                dTop = rect.top - dialogHeight - 16;
                dLeft = Math.max(16, Math.min(rect.left, vw - dialogWidth - 16));
            } else {
                // Compact viewport: dock at bottom
                dTop = Math.max(76, vh - dialogHeight - 16);
                dLeft = Math.max(16, (vw - dialogWidth) / 2);
            }
        }

        // FAIL-SAFE CLAMPING: dialog MUST ALWAYS fit completely in the viewport!
        // This guarantees the footer with Back and Finish buttons is NEVER cut off!
        dTop = Math.min(dTop, vh - dialogHeight - 16);
        dTop = Math.max(76, dTop);

        dialog.style.top = `${dTop}px`;
        dialog.style.left = `${dLeft}px`;
    }

    function renderStep(idx) {
        const step = STEPS[idx];
        if (!step) return;

        if (typeof step.beforeShow === 'function') {
            step.beforeShow();
        }

        requestAnimationFrame(() => {
            const targetEl = step.getTarget();
            if (targetEl) {
                const headerHeight = 64;
                const targetRect = targetEl.getBoundingClientRect();
                const pageY = window.pageYOffset || document.documentElement.scrollTop;
                const targetAbsoluteTop = pageY + targetRect.top;

                let targetScrollY = pageY;
                if (targetRect.height > 280) {
                    // For studentTerminal, scroll so top sits 16px below header, leaving clearance below for dialog!
                    targetScrollY = targetAbsoluteTop - headerHeight - 16;
                } else if (step.preferredPlacement === 'above' || idx === STEPS.length - 1) {
                    // For Section Navigation / Stepper at bottom:
                    // Scroll so target sits near the bottom, leaving clear space ABOVE for the dialog!
                    targetScrollY = targetAbsoluteTop - window.innerHeight + targetRect.height + 40;
                } else {
                    targetScrollY = targetAbsoluteTop - (window.innerHeight - targetRect.height) / 2;
                }

                const maxScroll = Math.max(0, document.documentElement.scrollHeight - window.innerHeight);
                targetScrollY = Math.max(0, Math.min(targetScrollY, maxScroll));

                window.scrollTo({
                    top: targetScrollY,
                    behavior: 'instant'
                });

                requestAnimationFrame(() => {
                    positionSpotlightAndDialog(targetEl, step);
                });
            }

            if (targetLabel) targetLabel.textContent = step.label;
            if (stepText) stepText.textContent = `Quick Tour · ${idx + 1} of ${STEPS.length}`;
            if (iconBox) iconBox.innerHTML = step.icon;
            if (titleEl) titleEl.textContent = step.title;
            if (descEl) descEl.textContent = step.desc;
            if (proTipText) proTipText.textContent = step.tip;

            // Update dots
            dots.forEach((dot, dIdx) => {
                if (dIdx === idx) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });

            // Update button states
            if (prevBtn) {
                prevBtn.style.visibility = idx === 0 ? 'hidden' : 'visible';
            }
            if (nextBtnText) {
                nextBtnText.textContent = idx === STEPS.length - 1 ? 'Finish tour' : 'Next';
            }
        });
    }

    function startTutorial() {
        isActive = true;
        currentStep = 0;
        document.body.classList.add('tutorial-active-lock');
        window.addEventListener('wheel', preventScrollDuringTour, { passive: false });
        window.addEventListener('touchmove', preventScrollDuringTour, { passive: false });

        overlay.style.display = 'block';
        void overlay.offsetWidth;
        overlay.classList.add('tutorial-active');
        renderStep(0);
    }

    function endTutorial() {
        isActive = false;
        document.body.classList.remove('tutorial-active-lock');
        window.removeEventListener('wheel', preventScrollDuringTour, { passive: false });
        window.removeEventListener('touchmove', preventScrollDuringTour, { passive: false });

        overlay.classList.remove('tutorial-active');
        setTimeout(() => {
            overlay.style.display = 'none';
        }, 320);
    }

    function nextStep() {
        if (currentStep < STEPS.length - 1) {
            currentStep++;
            renderStep(currentStep);
        } else {
            endTutorial();
        }
    }

    function prevStep() {
        if (currentStep > 0) {
            currentStep--;
            renderStep(currentStep);
        }
    }

    if (nextBtn) nextBtn.addEventListener('click', nextStep);
    if (prevBtn) prevBtn.addEventListener('click', prevStep);
    if (skipBtn) skipBtn.addEventListener('click', endTutorial);

    if (reopenBtn) {
        reopenBtn.addEventListener('click', () => {
            if (isActive) {
                endTutorial();
            } else {
                startTutorial();
            }
        });
    }

    // Keyboard navigation: ESC to skip, Left arrow for back, Right arrow for next, 'H' to replay
    document.addEventListener('keydown', (e) => {
        if (!isActive) {
            if (e.key.toLowerCase() === 'h' && !['INPUT', 'TEXTAREA'].includes(document.activeElement?.tagName)) {
                e.preventDefault();
                startTutorial();
            }
            return;
        }

        if (e.key === 'Escape') {
            e.preventDefault();
            endTutorial();
        } else if (e.key === 'ArrowRight' || e.key === 'Enter') {
            e.preventDefault();
            nextStep();
        } else if (e.key === 'ArrowLeft') {
            e.preventDefault();
            prevStep();
        }
    });

    // Real-time synchronization on resize or scroll
    function updateSpotlightCoords() {
        if (!isActive) return;
        const step = STEPS[currentStep];
        if (step) {
            const target = step.getTarget();
            if (target) positionSpotlightAndDialog(target, step);
        }
    }

    window.addEventListener('resize', updateSpotlightCoords);
    window.addEventListener('scroll', updateSpotlightCoords, { passive: true });

    // Expose launcher
    window.launchInteractiveTutorial = () => {
        setTimeout(() => {
            startTutorial();
        }, 150);
    };
}

/**
 * 1. Theme Management (Obsidian Carbon vs Monochromatic Paper)
 */
function initTheme() {
    const themeBtn = document.getElementById('themeToggleBtn');
    const savedTheme = localStorage.getItem('portfolio-theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const initialTheme = savedTheme || (prefersDark ? 'dark' : 'light');

    applyTheme(initialTheme, false);

    function applyTheme(theme, isUserToggle = false) {
        if (isUserToggle) {
            document.documentElement.classList.add('theme-transitioning');
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('portfolio-theme', theme);
            setTimeout(() => {
                document.documentElement.classList.remove('theme-transitioning');
            }, 380);
        } else {
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('portfolio-theme', theme);
        }
    }

    if (themeBtn) {
        themeBtn.addEventListener('click', () => {
            const current = document.documentElement.getAttribute('data-theme');
            const next = current === 'light' ? 'dark' : 'light';
            applyTheme(next, true);
        });
    }
}

/**
 * 2. Auto-Collapsible Left Sidebar (Desktop Hover Detection)
 * - Hover on sidebar EXCLUDING the buttons: automatically collapses
/**
 * 2. Collapsible Left Sidebar (01 - 03 Only)
 * Features:
 * - Explicit toggle via in-sidebar collapse button (#sidebarCollapseBtn)
 * - Explicit toggle via top header button (#headerSidebarToggleBtn)
 * - Keyboard shortcut (Ctrl+B / Cmd+B)
 * - State persistence in localStorage
 */
function initSidebarCollapse() {
    const sidebar = document.getElementById('siteSidebar');
    if (!sidebar) return;

    function isDesktop() {
        return window.innerWidth >= 1024;
    }

    function collapse() {
        if (isDesktop()) {
            document.body.classList.add('sidebar-collapsed');
            localStorage.setItem('sidebar-collapsed', 'true');
            if (typeof updateSidebarGlassIndicator === 'function') {
                requestAnimationFrame(() => updateSidebarGlassIndicator(true));
                setTimeout(() => updateSidebarGlassIndicator(true), 220);
                setTimeout(() => updateSidebarGlassIndicator(true), 430);
            }
        }
    }

    function expand() {
        if (isDesktop()) {
            document.body.classList.remove('sidebar-collapsed');
            localStorage.setItem('sidebar-collapsed', 'false');
            if (typeof updateSidebarGlassIndicator === 'function') {
                requestAnimationFrame(() => updateSidebarGlassIndicator(true));
                setTimeout(() => updateSidebarGlassIndicator(true), 220);
                setTimeout(() => updateSidebarGlassIndicator(true), 430);
            }
        }
    }

    function toggle() {
        if (document.body.classList.contains('sidebar-collapsed')) {
            expand();
        } else {
            collapse();
        }
    }

    // Restore saved state if saved as collapsed on initial load
    const isSavedCollapsed = localStorage.getItem('sidebar-collapsed') === 'true';
    if (isSavedCollapsed && isDesktop()) {
        document.body.classList.add('sidebar-collapsed');
    }

    // Sidebar collapse button click handler
    const sidebarCollapseBtn = document.getElementById('sidebarCollapseBtn');
    if (sidebarCollapseBtn) {
        sidebarCollapseBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            toggle();
        });
    }

    // Header sidebar toggle button click handler
    const headerSidebarToggleBtn = document.getElementById('headerSidebarToggleBtn');
    if (headerSidebarToggleBtn) {
        headerSidebarToggleBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            toggle();
        });
    }

    // Keyboard shortcut: Ctrl+B or Cmd+B for power users
    document.addEventListener('keydown', (e) => {
        if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'b') {
            e.preventDefault();
            toggle();
        }
    });
}

/**
 * 3. Mobile Responsive Sidebar Drawer
 */
function initMobileDrawer() {
    const mobileBtn = document.getElementById('mobileMenuBtn');
    const sidebar = document.getElementById('siteSidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const closeBtn = document.getElementById('sidebarCloseBtn');

    if (!mobileBtn || !sidebar || !overlay) return;

    function openDrawer() {
        sidebar.classList.add('drawer-open');
        overlay.classList.add('active');
        mobileBtn.setAttribute('aria-expanded', 'true');
        overlay.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
        sidebar.classList.remove('drawer-open');
        overlay.classList.remove('active');
        mobileBtn.setAttribute('aria-expanded', 'false');
        overlay.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
    }

    mobileBtn.addEventListener('click', openDrawer);

    if (closeBtn) {
        ['click', 'touchend'].forEach(evt => {
            closeBtn.addEventListener(evt, (e) => {
                e.preventDefault();
                e.stopPropagation();
                closeDrawer();
            }, { passive: false });
        });
    }

    ['click', 'touchend'].forEach(evt => {
        overlay.addEventListener(evt, (e) => {
            e.preventDefault();
            closeDrawer();
        }, { passive: false });
    });

    // Touch swipe left on open sidebar to close
    let sidebarTouchStartX = 0;
    sidebar.addEventListener('touchstart', (e) => {
        if (e.touches.length === 1) {
            sidebarTouchStartX = e.touches[0].clientX;
        }
    }, { passive: true });

    sidebar.addEventListener('touchend', (e) => {
        if (e.changedTouches.length === 1 && sidebar.classList.contains('drawer-open')) {
            const sidebarDiffX = e.changedTouches[0].clientX - sidebarTouchStartX;
            if (sidebarDiffX < -40) {
                closeDrawer();
            }
        }
    }, { passive: true });

    // Close drawer when navigating via link on mobile
    sidebar.querySelectorAll('.sidebar-nav-link').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 1024) {
                closeDrawer();
            }
        });
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && sidebar.classList.contains('drawer-open')) {
            closeDrawer();
        }
    });
}

/**
 * Sliding Liquid Glass Navigation Selector Indicator
 * Calculates the exact pixel coordinates of the active nav item and smoothly glides
 * the physical liquid glass pill up/down with physics easing.
 */
function updateSidebarGlassIndicator(animate = true) {
    const indicator = document.getElementById('sidebarGlassIndicator');
    const activeLink = document.querySelector('.sidebar-nav-link.active');
    const navList = document.getElementById('sidebarNavList');
    if (!indicator || !activeLink || !navList) return;

    const listRect = navList.getBoundingClientRect();
    const linkRect = activeLink.getBoundingClientRect();

    if (linkRect.width === 0 || linkRect.height === 0) return;

    const top = linkRect.top - listRect.top;
    const left = linkRect.left - listRect.left;
    const width = linkRect.width;
    const height = linkRect.height;

    if (!animate) {
        indicator.style.transition = 'none';
    } else {
        indicator.style.transition = '';
    }

    indicator.style.transform = `translate3d(${left}px, ${top}px, 0)`;
    indicator.style.width = `${width}px`;
    indicator.style.height = `${height}px`;
    indicator.style.opacity = '1';

    if (!animate) {
        void indicator.offsetHeight; // Force reflow
        indicator.style.transition = '';
    }
}
window.updateSidebarGlassIndicator = updateSidebarGlassIndicator;

/**
 * Sliding Liquid Glass Navigation Selector Indicator for Mobile Dock
 * Calculates the exact layout offset coordinates of the active mobile nav item and smoothly glides
 * the physical living liquid glass pill left/right with physics cubic-bezier easing.
 */
function updateMobileGlassIndicator(animate = true) {
    const indicator = document.getElementById('mobileGlassIndicator');
    const activeItem = document.querySelector('.mobile-nav-item.active');
    const navInner = document.querySelector('.mobile-bottom-nav-inner');
    if (!indicator || !activeItem || !navInner) return;

    // Use invariant layout box dimensions and offsets so parent transforms & scaling never skew positions
    const left = activeItem.offsetLeft;
    const top = activeItem.offsetTop;
    const width = activeItem.offsetWidth;
    const height = activeItem.offsetHeight;

    if (width === 0 || height === 0) return;

    if (!animate) {
        indicator.style.transition = 'none';
        indicator.classList.remove('liquid-gliding');
    } else {
        indicator.style.transition = '';
        indicator.classList.add('liquid-gliding');
        setTimeout(() => {
            indicator.classList.remove('liquid-gliding');
        }, 380);
    }

    indicator.style.transform = `translate3d(${left}px, ${top}px, 0)`;
    indicator.style.width = `${width}px`;
    indicator.style.height = `${height}px`;
    indicator.style.opacity = '1';

    if (!animate) {
        void indicator.offsetHeight; // Force reflow
        indicator.style.transition = '';
    }
}
window.updateMobileGlassIndicator = updateMobileGlassIndicator;

/**
 * 4. SPA Section View Router (01 - 03)
 * Displays only one focused section at a time without continuous scrolling.
 */
function initSpaRouter() {
    const VALID_SECTIONS = ['intro', 'projects', 'contact'];
    const sections = document.querySelectorAll('.content-section[id]');
    const navLinks = document.querySelectorAll('.sidebar-nav-link[data-section]');

    if (!sections.length) return;

    function activateSection(targetId, updateHistory = true) {
        if (targetId === 'coursework' || targetId === 'experience') targetId = 'intro';
        if (targetId === 'notes') targetId = 'projects';
        if (!VALID_SECTIONS.includes(targetId)) {
            targetId = 'intro';
        }

        // Toggle visibility and ARIA states with forced reflow so entrance cascade plays cleanly
        sections.forEach(section => {
            const id = section.getAttribute('id');
            if (id === targetId) {
                section.classList.remove('spa-active');
                void section.offsetHeight; // Force reflow to re-trigger signature cascade animation
                section.classList.add('spa-active');
                section.setAttribute('aria-hidden', 'false');
            } else {
                section.classList.remove('spa-active');
                section.setAttribute('aria-hidden', 'true');
            }
        });

        // Update active class & aria-current on sidebar items
        navLinks.forEach(link => {
            const sec = link.getAttribute('data-section');
            if (sec === targetId) {
                link.classList.add('active');
                link.setAttribute('aria-current', 'page');
            } else {
                link.classList.remove('active');
                link.removeAttribute('aria-current');
            }
        });

        // Update active class & aria-current on mobile bottom dock items
        const mobileLinks = document.querySelectorAll('.mobile-nav-item[data-section]');
        mobileLinks.forEach(link => {
            const sec = link.getAttribute('data-section');
            if (sec === targetId) {
                link.classList.remove('active');
                void link.offsetHeight; // Force reflow to re-trigger spring bounce animation
                link.classList.add('active');
                link.setAttribute('aria-current', 'page');
            } else {
                link.classList.remove('active');
                link.removeAttribute('aria-current');
            }
        });

        // Glide the physical liquid glass selector indicators (Desktop: up/down, Mobile: left/right)!
        updateSidebarGlassIndicator(true);
        updateMobileGlassIndicator(true);

        // Update URL hash without causing a default jump
        if (updateHistory) {
            if (window.location.hash !== `#${targetId}`) {
                history.pushState(null, '', `#${targetId}`);
            }
        }

        // Reset scroll position cleanly to top of view so content is never eaten by the header
        window.scrollTo({ top: 0, left: 0, behavior: 'instant' });
        document.documentElement.scrollTop = 0;
        document.body.scrollTop = 0;

        // If mobile drawer was open, close it
        const sidebar = document.getElementById('siteSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const mobileBtn = document.getElementById('mobileMenuBtn');
        if (sidebar && sidebar.classList.contains('drawer-open')) {
            sidebar.classList.remove('drawer-open');
            if (overlay) overlay.classList.remove('active');
            if (mobileBtn) mobileBtn.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        }
    }
    window.activateSection = activateSection;

    // Sidebar navigation clicks
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const target = link.getAttribute('data-section');
            activateSection(target);
        });
    });

    // Mobile bottom navigation dock item clicks with subtle tactile haptic
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-item[data-section]');
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const target = link.getAttribute('data-section');
            if (window.navigator?.vibrate) window.navigator.vibrate(8);
            activateSection(target);
        });
    });

    // In-page anchor clicks targeting any SPA section (e.g. CTA buttons, header logo, steppers)
    document.addEventListener('click', (e) => {
        const anchor = e.target.closest('a[href^="#"]');
        if (!anchor) return;

        const hash = anchor.getAttribute('href');
        if (!hash || hash === '#' || hash === '#resumeModal') return;

        const sectionId = hash.replace('#', '');
        if (VALID_SECTIONS.includes(sectionId)) {
            e.preventDefault();
            activateSection(sectionId);
        }
    });

    // Browser navigation (Back / Forward)
    window.addEventListener('popstate', () => {
        const currentHash = window.location.hash.replace('#', '');
        activateSection(currentHash || 'intro', false);
    });

    window.addEventListener('hashchange', () => {
        const currentHash = window.location.hash.replace('#', '');
        activateSection(currentHash || 'intro', false);
    });

    // Keyboard shortcut navigation (Left/Right arrows when not in an input)
    document.addEventListener('keydown', (e) => {
        if (['INPUT', 'TEXTAREA'].includes(document.activeElement?.tagName)) return;
        if (e.altKey || e.ctrlKey || e.metaKey) return;

        const currentActive = document.querySelector('.content-section.spa-active');
        const currentId = currentActive ? currentActive.getAttribute('id') : 'intro';
        const currentIndex = VALID_SECTIONS.indexOf(currentId);

        if (e.key === 'ArrowRight' && currentIndex < VALID_SECTIONS.length - 1) {
            e.preventDefault();
            activateSection(VALID_SECTIONS[currentIndex + 1]);
        } else if (e.key === 'ArrowLeft' && currentIndex > 0) {
            e.preventDefault();
            activateSection(VALID_SECTIONS[currentIndex - 1]);
        }
    });

    // Initial load route activation
    const initialHash = window.location.hash.replace('#', '');
    activateSection(initialHash || 'intro', false);

    // Initial positioning of liquid glass selectors without animation
    updateSidebarGlassIndicator(false);
    updateMobileGlassIndicator(false);

    setTimeout(() => {
        updateSidebarGlassIndicator(false);
        updateMobileGlassIndicator(false);
    }, 100);
    setTimeout(() => {
        updateSidebarGlassIndicator(false);
        updateMobileGlassIndicator(false);
    }, 350);

    // Auto-update indicators on viewport resize & orientation change
    window.addEventListener('resize', () => {
        updateSidebarGlassIndicator(false);
        updateMobileGlassIndicator(false);
    });
    window.addEventListener('orientationchange', () => {
        setTimeout(() => {
            updateSidebarGlassIndicator(false);
            updateMobileGlassIndicator(false);
        }, 150);
    });
    if (document.fonts?.ready) {
        document.fonts.ready.then(() => {
            updateSidebarGlassIndicator(false);
            updateMobileGlassIndicator(false);
        });
    }
}

/**
 * 5. Interactive Student Terminal Console
 */
function initStudentTerminal() {
    const terminalOutput = document.getElementById('terminalOutput');
    const terminalForm = document.getElementById('terminalForm');
    const terminalInput = document.getElementById('terminalInput');
    const chips = document.querySelectorAll('.term-chip');

    if (!terminalOutput) return;

    const COMMAND_DB = {
        'whoami': "John Senen Estrella\n3rd year college student taking the program of BSIT at NU Baliwag.\nPassionate about web systems, relational databases, network infrastructure, and clean architecture.",
        'cat status.txt': "Standing: 3rd Year College Student\nProgram: Bachelor of Science in Information Technology (BSIT)\nInstitution: National University Baliwag (NU Baliwag)\nFocus: Web Development, Database Management, and Networking\nUpcoming: Industry Practicum / OJT Placement",
        'status': "Standing: 3rd Year College Student\nProgram: Bachelor of Science in Information Technology (BSIT)\nInstitution: National University Baliwag (NU Baliwag)\nFocus: Web Development, Database Management, and Networking\nUpcoming: Industry Practicum / OJT Placement",
        'courses --current': "[BSIT Core Coursework & Labs]\n- IT 301: Web Systems and Technologies (PHP, MySQL, CSS)\n- IT 302: Database Management Systems 2 (Normalization, ACID, SQL)\n- IT 303: Advanced Computer Networks (Subnetting, Network Architecture)\n- IT 304: Systems Analysis and Design (SDLC, ERD, DFD Modeling)\n- IT 201: Object-Oriented Programming (Java / PHP OOP)\n- IT 202: Information Assurance and Security (Auth & Defense)",
        'courses': "[BSIT Core Coursework & Labs]\n- IT 301: Web Systems and Technologies (PHP, MySQL, CSS)\n- IT 302: Database Management Systems 2 (Normalization, ACID, SQL)\n- IT 303: Advanced Computer Networks (Subnetting, Network Architecture)\n- IT 304: Systems Analysis and Design (SDLC, ERD, DFD Modeling)\n- IT 201: Object-Oriented Programming (Java / PHP OOP)\n- IT 202: Information Assurance and Security (Auth & Defense)",
        'cat favorite_bug.log': "Late night database debugging session:\nSpent 2 hours troubleshooting why a student registration query failed silently.\nRoot cause: Unquoted string literal inside an unparameterized SQL concatenation.\nLesson: Switched completely to PDO prepared statements with parameterized binds. Never concatenate raw input into SQL.",
        'favorite_bug': "Late night database debugging session:\nSpent 2 hours troubleshooting why a student registration query failed silently.\nRoot cause: Unquoted string literal inside an unparameterized SQL concatenation.\nLesson: Switched completely to PDO prepared statements with parameterized binds. Never concatenate raw input into SQL.",
        'bugs': "Late night database debugging session:\nSpent 2 hours troubleshooting why a student registration query failed silently.\nRoot cause: Unquoted string literal inside an unparameterized SQL concatenation.\nLesson: Switched completely to PDO prepared statements with parameterized binds. Never concatenate raw input into SQL.",
        'finger john': "Login: johnsenen         Name: John Senen Estrella\nStanding: 3rd Year BSIT Student\nSchool: National University Baliwag\nEmail: johnsenenestrella@gmail.com\nStatus: Preparing for incoming industry practicum (OJT). Open to feedback & tech collaboration.",
        'finger': "Login: johnsenen         Name: John Senen Estrella\nStanding: 3rd Year BSIT Student\nSchool: National University Baliwag\nEmail: johnsenenestrella@gmail.com\nStatus: Preparing for incoming industry practicum (OJT). Open to feedback & tech collaboration.",
        'cat goals.txt': "BSIT Growth Goals:\n1. Master end-to-end full-stack web systems with PHP & MySQL\n2. Configure enterprise-grade network architecture and subnet routing\n3. Complete industry practicum / OJT with high real-world impact\n4. Develop an impactful capstone project solving campus workflows",
        'goals': "BSIT Growth Goals:\n1. Master end-to-end full-stack web systems with PHP & MySQL\n2. Configure enterprise-grade network architecture and subnet routing\n3. Complete industry practicum / OJT with high real-world impact\n4. Develop an impactful capstone project solving campus workflows",
        'contact': "Name: John Senen Estrella\nProgram: BSIT (3rd Year)\nInstitution: NU Baliwag\nEmail: johnsenenestrella@gmail.com\nLocation: Baliwag, Bulacan, Philippines",
        'stack': "Languages: PHP 8, JavaScript (ES6+), SQL, Java, HTML5, CSS3\nFrameworks & DBs: MySQL / MariaDB, Apache, PDO Architecture\nNetworking & Tools: Network Infrastructure, Wireshark, Git & GitHub, VS Code\nMethodologies: SDLC Modeling, DFD & ERD Design, Agile & Scrum Basics",
        'skills': "Languages: PHP 8, JavaScript (ES6+), SQL, Java, HTML5, CSS3\nFrameworks & DBs: MySQL / MariaDB, Apache, PDO Architecture\nNetworking & Tools: Network Infrastructure, Wireshark, Git & GitHub, VS Code\nMethodologies: SDLC Modeling, DFD & ERD Design, Agile & Scrum Basics",
        'help': "Available commands:\n  whoami            - Display student bio\n  cat status.txt    - View current BSIT academic status\n  cat goals.txt     - Read growth & practicum goals\n  courses           - List BSIT enrolled coursework\n  cat favorite_bug.log - Read database debugging story\n  finger john       - View student contact & school\n  stack             - View technical toolkit\n  clear             - Reset terminal output"
    };

    function runCommand(rawCmd) {
        const cmd = rawCmd.trim();
        if (!cmd) return;

        if (cmd.toLowerCase() === 'clear') {
            terminalOutput.innerHTML = '';
            return;
        }

        const normalized = cmd.toLowerCase();
        const responseText = COMMAND_DB[normalized] || COMMAND_DB[cmd] || `zsh: command not found: ${cmd}. Type 'help' for available commands.`;

        const commandBlock = document.createElement('div');
        commandBlock.className = 'term-entry';
        commandBlock.innerHTML = `
            <div class="term-line prompt-line">
                <span class="term-user">john@nubaliwag:~$</span>
                <span class="term-cmd">${escapeHtml(cmd)}</span>
            </div>
            <div class="term-response">${escapeHtml(responseText)}</div>
        `;

        terminalOutput.appendChild(commandBlock);
        terminalOutput.scrollTop = terminalOutput.scrollHeight;
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // Chip click handlers
    chips.forEach(chip => {
        chip.addEventListener('click', () => {
            const cmd = chip.getAttribute('data-cmd');
            if (cmd) {
                runCommand(cmd);
                if (terminalInput) terminalInput.value = '';
            }
        });
    });

    // Terminal input cursor handling
    const termCursor = document.getElementById('termCursor');
    if (terminalInput && termCursor) {
        terminalInput.addEventListener('input', () => {
            if (terminalInput.value.length > 0) {
                termCursor.classList.add('is-hidden');
            } else {
                termCursor.classList.remove('is-hidden');
            }
        });
        terminalInput.addEventListener('focus', () => {
            if (terminalInput.value.length > 0) {
                termCursor.classList.add('is-hidden');
            }
        });
        terminalInput.addEventListener('blur', () => {
            termCursor.classList.remove('is-hidden');
        });
    }

    // Form input handler
    if (terminalForm && terminalInput) {
        terminalForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const val = terminalInput.value;
            if (val) {
                runCommand(val);
                terminalInput.value = '';
                if (termCursor) termCursor.classList.remove('is-hidden');
            }
        });
    }
}

/**
 * 6. Coursework Category Filtering
 */
function initCourseworkFilters() {
    const pills = document.querySelectorAll('.filter-pill');
    const cards = document.querySelectorAll('.course-card');

    if (!pills.length || !cards.length) return;

    pills.forEach(pill => {
        pill.addEventListener('click', () => {
            pills.forEach(p => {
                p.classList.remove('active');
                p.setAttribute('aria-selected', 'false');
            });
            pill.classList.add('active');
            pill.setAttribute('aria-selected', 'true');

            const filter = pill.getAttribute('data-filter');
            let delay = 0;

            cards.forEach(card => {
                const category = card.getAttribute('data-category');
                if (filter === 'all' || category === filter) {
                    card.style.display = 'flex';
                    card.classList.remove('card-enter');
                    void card.offsetWidth;
                    card.style.animationDelay = `${delay}ms`;
                    card.classList.add('card-enter');
                    delay = Math.min(delay + 30, 150);
                } else {
                    card.style.display = 'none';
                    card.classList.remove('card-enter');
                }
            });
        });
    });
}

/**
 * 7. Dual-Mode Project Card Tabs (Overview vs Retrospective)
 */
function initProjectTabs() {
    const cards = document.querySelectorAll('.student-project-card');

    cards.forEach(card => {
        const tabBtns = card.querySelectorAll('.project-tab-btn');
        const overviewContent = card.querySelector('.tab-overview');
        const retroContent = card.querySelector('.tab-retrospective');

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const targetTab = btn.getAttribute('data-tab');

                tabBtns.forEach(b => {
                    b.classList.remove('active');
                    b.setAttribute('aria-selected', 'false');
                });
                btn.classList.add('active');
                btn.setAttribute('aria-selected', 'true');

                if (targetTab === 'overview') {
                    if (overviewContent) overviewContent.classList.add('active');
                    if (retroContent) retroContent.classList.remove('active');
                } else if (targetTab === 'retrospective') {
                    if (overviewContent) overviewContent.classList.remove('active');
                    if (retroContent) retroContent.classList.add('active');
                }
            });
        });
    });
}

/**
 * 8. Accessible Resume Modal
 */
function initResumeModal() {
    const modal = document.getElementById('resumeModal');
    const openBtns = document.querySelectorAll('#openResumeModalBtn, #profileResumeBtn, #introResumeBtn');
    const closeBtn = document.getElementById('closeResumeModalBtn');
    const closeFooterBtn = document.getElementById('closeResumeModalFooterBtn');

    if (!modal) return;

    function openModal() {
        modal.classList.add('modal-open');
        modal.setAttribute('aria-hidden', 'false');
        openBtns.forEach(btn => btn.setAttribute('aria-expanded', 'true'));
        document.body.style.overflow = 'hidden';
        if (closeBtn) closeBtn.focus();
    }

    function closeModal() {
        modal.classList.remove('modal-open');
        modal.setAttribute('aria-hidden', 'true');
        openBtns.forEach(btn => btn.setAttribute('aria-expanded', 'false'));
        document.body.style.overflow = '';
        if (openBtns.length > 0) openBtns[0].focus();
    }

    openBtns.forEach(btn => btn.addEventListener('click', openModal));
    if (closeBtn) closeBtn.addEventListener('click', closeModal);
    if (closeFooterBtn) closeFooterBtn.addEventListener('click', closeModal);

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('modal-open')) {
            closeModal();
        }
    });
}

/**
 * 9. Mobile Touch Swipe Gesture Navigation
 * Enables seamless left/right horizontal swipe between sections 01-06.
 * Tuned with physics thresholds so vertical scrolling is completely uninhibited.
 */
function initTouchGestures() {
    let touchStartX = 0;
    let touchStartY = 0;
    let touchStartTime = 0;

    window.addEventListener('touchstart', (e) => {
        if (e.touches.length !== 1) return;
        touchStartX = e.touches[0].clientX;
        touchStartY = e.touches[0].clientY;
        touchStartTime = Date.now();
    }, { passive: true });

    window.addEventListener('touchend', (e) => {
        if (e.changedTouches.length !== 1) return;

        // Skip gesture if resume modal or sidebar drawer is open
        const resumeModal = document.getElementById('resumeModal');
        const sidebar = document.getElementById('siteSidebar');
        if (resumeModal?.classList.contains('modal-open')) return;
        if (sidebar?.classList.contains('drawer-open')) return;

        // Skip gesture if interacting with input fields, scrollable code strips, or buttons
        const target = e.target;
        if (target.closest('input, textarea, select, button, .memory-hierarchy-strip, .course-visual-artifact, .filter-bar, pre, code')) {
            return;
        }

        const touchEndX = e.changedTouches[0].clientX;
        const touchEndY = e.changedTouches[0].clientY;
        const diffX = touchEndX - touchStartX;
        const diffY = touchEndY - touchStartY;
        const elapsed = Date.now() - touchStartTime;

        // Intentional horizontal swipe threshold:
        // - At least 55px horizontal displacement
        // - Horizontal speed: completed within 500ms
        // - Strong horizontal bias: Math.abs(diffX) > Math.abs(diffY) * 1.6
        if (Math.abs(diffX) > 55 && Math.abs(diffX) > Math.abs(diffY) * 1.6 && elapsed < 500) {
            const VALID_SECTIONS = ['intro', 'coursework', 'projects', 'notes', 'experience', 'contact'];
            const currentActive = document.querySelector('.content-section.spa-active');
            const currentId = currentActive ? currentActive.getAttribute('id') : 'intro';
            const currentIndex = VALID_SECTIONS.indexOf(currentId);

            if (diffX < 0 && currentIndex < VALID_SECTIONS.length - 1) {
                // Swipe Left -> Next Section
                if (window.navigator?.vibrate) window.navigator.vibrate(10);
                if (typeof window.activateSection === 'function') {
                    window.activateSection(VALID_SECTIONS[currentIndex + 1]);
                }
            } else if (diffX > 0 && currentIndex > 0) {
                // Swipe Right -> Previous Section
                if (window.navigator?.vibrate) window.navigator.vibrate(10);
                if (typeof window.activateSection === 'function') {
                    window.activateSection(VALID_SECTIONS[currentIndex - 1]);
                }
            }
        }
    }, { passive: true });
}
