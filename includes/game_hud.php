<?php
/**
 * Interactive Portfolio Tour Spotlight Overlay
 * Minimalist, elegant spotlight framing interface features
 * with clean dialog cards, SVG icons, and keyboard shortcuts.
 */
?>
<div class="game-tutorial-overlay" id="gameTutorialOverlay" role="dialog" aria-modal="true" aria-label="Interactive Portfolio Tour">
    <!-- Dynamic Spotlight Cutout (Frames target components cleanly) -->
    <div class="tutorial-spotlight" id="tutorialSpotlight" aria-hidden="true">
        <div class="spotlight-target-tag" id="spotlightTargetLabel">Sidebar</div>
    </div>

    <!-- Clean Tour Dialog Card -->
    <div class="tutorial-dialog" id="tutorialDialog" role="region" aria-live="polite">
        <div class="tutorial-dialog-inner">
            <!-- Header & Step Indicator -->
            <div class="tutorial-dialog-header">
                <div class="tutorial-step-tag">
                    <span class="tutorial-step-dot" aria-hidden="true"></span>
                    <span class="tutorial-step-text" id="tutorialStepText">Quick Tour · 1 of 4</span>
                </div>
                <button type="button" class="tutorial-skip-btn" id="tutorialSkipBtn" aria-label="Skip tour" title="Skip Tour (ESC)">
                    <span>Skip</span>
                    <kbd class="tutorial-skip-kbd" aria-hidden="true">ESC</kbd>
                </button>
            </div>

            <!-- Content Area -->
            <div class="tutorial-dialog-body">
                <div class="tutorial-badge-col" aria-hidden="true">
                    <div class="tutorial-icon-box" id="tutorialIconBox">
                        <?= render_icon('sidebar') ?>
                    </div>
                </div>
                <div class="tutorial-text-col">
                    <h3 class="tutorial-title" id="tutorialTitle">Navigation Dock &amp; Auto-Collapse</h3>
                    <p class="tutorial-desc" id="tutorialDesc">
                        Hover directly over any numbered button (01–06) to expand section titles. Hovering on empty sidebar space collapses it into a slim rail.
                    </p>
                    <div class="tutorial-pro-tip" id="tutorialProTip">
                        <span class="pro-tip-label">Tip:</span>
                        <span class="pro-tip-desc" id="tutorialProTipText">Buttons stay open while hovered—they never collapse while you interact with them!</span>
                    </div>
                </div>
            </div>

            <!-- Footer Controls & Pager -->
            <div class="tutorial-dialog-footer">
                <div class="tutorial-dots" id="tutorialDots" aria-hidden="true">
                    <span class="tutorial-dot active"></span>
                    <span class="tutorial-dot"></span>
                    <span class="tutorial-dot"></span>
                    <span class="tutorial-dot"></span>
                </div>

                <div class="tutorial-actions">
                    <button type="button" class="btn btn-secondary btn-sm tutorial-btn-prev" id="tutorialPrevBtn" aria-label="Previous step">
                        <span>Back</span>
                    </button>
                    <button type="button" class="btn btn-primary btn-sm tutorial-btn-next" id="tutorialNextBtn" aria-label="Next step">
                        <span id="tutorialNextBtnText">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
