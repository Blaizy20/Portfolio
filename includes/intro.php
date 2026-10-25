<?php
/**
 * Introduction & Interactive Student Terminal Template
 */
?>
<section class="content-section intro-section spa-active" id="intro">
    <!-- Student Profile Hero Header (Integrated at top of Main Content) -->
    <div class="intro-profile-header">
        <div class="intro-profile-top">
            <div class="intro-avatar-cluster">
                <div class="intro-avatar-box" title="<?= htmlspecialchars($data['site']['author']) ?>">
                    <?php if (!empty($data['site']['avatar_photo']) && file_exists(__DIR__ . '/../' . $data['site']['avatar_photo'])): ?>
                        <img src="<?= htmlspecialchars($data['site']['avatar_photo']) ?>" alt="<?= htmlspecialchars($data['site']['author']) ?>" class="intro-avatar-img">
                    <?php else: ?>
                        <span class="intro-avatar-monogram">JSE</span>
                    <?php endif; ?>
                </div>
                <div class="intro-identity">
                    <h1 class="intro-author-name"><?= htmlspecialchars($data['site']['author']) ?></h1>
                    <div class="intro-author-role">
                        <span><?= htmlspecialchars($data['site']['role']) ?></span>
                        <span class="role-separator">&middot;</span>
                        <span><?= htmlspecialchars($data['site']['term']) ?></span>
                    </div>
                </div>
            </div>

            <!-- Quick Action CTAs & Direct Contact -->
            <div class="intro-action-group">
                <div class="intro-actions">
                    <a href="#contact" class="btn btn-primary btn-sm">
                        <?= render_icon('mail') ?>
                        <span>Get in Touch</span>
                    </a>
                    <button type="button" class="btn btn-secondary btn-sm" id="introResumeBtn" aria-haspopup="dialog" aria-expanded="false" aria-controls="resumeModal">
                        <?= render_icon('download') ?>
                        <span>Resume / CV</span>
                    </button>
                </div>

                <div class="intro-socials-row">
                    <?php foreach ($data['socials'] as $social): ?>
                        <a href="<?= htmlspecialchars($social['url']) ?>" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="intro-social-btn" 
                           aria-label="<?= htmlspecialchars($social['name']) ?>"
                           title="<?= htmlspecialchars($social['name']) ?>">
                            <?= render_icon($social['icon']) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="intro-narrative">
            <h2 class="intro-headline" id="typedIntroHeadline">
                <span class="typewriter-text" id="typewriterText">Building responsive interfaces, design systems, and modern web applications.</span>
                <span class="typewriter-cursor" id="typewriterCursor" aria-hidden="true"></span>
            </h2>
            <p class="intro-lead" id="introLeadText">
                <span class="typewriter-text" id="typewriterLeadText">Hi, I'm <strong><?= htmlspecialchars($data['site']['author']) ?></strong>. I'm an aspiring frontend developer and UI/UX designer, currently in my 3rd year taking Bachelor of Science in Information Technology (BSIT) at National University (NU) Baliwag. This portfolio documents my interface experiments, design engineering projects, and the web craft I'm developing along the way.</span>
                <span class="typewriter-cursor is-hidden" id="typewriterLeadCursor" aria-hidden="true"></span>
            </p>
            <p class="intro-subtext staged-subtext-hidden" id="introSubtext">
                Focused on crafting responsive interfaces, fluid micro-interactions, accessible design systems (WCAG 2.1 AA), and bridging the gap between design engineering and solid web systems.
            </p>
        </div>
    </div>

    <!-- Student Milestone Metrics (Asymmetric Bento Grid Hierarchy) -->
    <div class="milestones-grid">
        <?php foreach ($data['student_milestones'] as $milestone): ?>
            <div class="milestone-card <?= !empty($milestone['is_highlight']) ? 'milestone-highlight' : 'milestone-standard' ?>" data-milestone="<?= htmlspecialchars($milestone['id'] ?? '') ?>">
                <?php if (!empty($milestone['tag'])): ?>
                    <div class="milestone-tag-row">
                        <span class="milestone-tag"><?= htmlspecialchars($milestone['tag']) ?></span>
                    </div>
                <?php endif; ?>

                <?php if (($milestone['id'] ?? '') === 'institution'): ?>
                    <div class="campus-milestone-brand">
                        <div class="campus-logo-badge" title="National University Emblem">
                            <?= render_icon('nu-logo', 'nu-campus-logo') ?>
                        </div>
                        <div class="milestone-value"><?= htmlspecialchars($milestone['value']) ?></div>
                    </div>
                <?php else: ?>
                    <div class="milestone-value"><?= htmlspecialchars($milestone['value']) ?></div>
                <?php endif; ?>
                <div class="milestone-label"><?= htmlspecialchars($milestone['label']) ?></div>
                <div class="milestone-detail"><?= htmlspecialchars($milestone['detail']) ?></div>

                <?php if (!empty($milestone['chips'])): 
                    $isTechFocus = (($milestone['id'] ?? '') === 'focus');
                ?>
                    <div class="milestone-chips-row <?= $isTechFocus ? 'milestone-chips-row--logos' : '' ?>">
                        <?php foreach ($milestone['chips'] as $chip): ?>
                            <?php
                                $clean = strtolower(trim(preg_replace('/[^a-z0-9]+/i', '', $chip)));
                                $mod = 'default';
                                if (str_starts_with($clean, 'php')) $mod = 'php';
                                elseif (str_contains($clean, 'mysql') || str_contains($clean, 'sql')) $mod = 'mysql';
                                elseif (str_contains($clean, 'typescript') || $clean === 'ts') $mod = 'typescript';
                                elseif (str_contains($clean, 'html')) $mod = 'html5';
                                elseif (str_contains($clean, 'css')) $mod = 'css3';
                                elseif (str_contains($clean, 'javascript') || $clean === 'js') $mod = 'javascript';
                                elseif (str_contains($clean, 'python')) $mod = 'python';
                                elseif (str_contains($clean, 'java')) $mod = 'java';
                                elseif (str_contains($clean, 'git')) $mod = 'git';
                                elseif (str_contains($clean, 'ojt') || str_contains($clean, 'practicum') || str_contains($clean, 'internship')) $mod = 'ojt';
                                elseif (str_contains($clean, 'system') || str_contains($clean, 'modeling')) $mod = 'modeling';
                            ?>
                            <?php if ($isTechFocus): ?>
                                <span class="milestone-chip milestone-chip--logo-only milestone-chip--<?= $mod ?>" 
                                      data-tech="<?= $mod ?>" 
                                      aria-label="<?= htmlspecialchars($chip) ?>" 
                                      role="img"
                                      tabindex="0">
                                    <?= render_tech_icon($chip, 'milestone-chip-icon') ?>
                                    <span class="chip-instant-tooltip" aria-hidden="true"><?= htmlspecialchars($chip) ?></span>
                                </span>
                            <?php else: ?>
                                <span class="milestone-chip milestone-chip--<?= $mod ?>" data-tech="<?= $mod ?>">
                                    <?= render_tech_icon($chip, 'milestone-chip-icon') ?>
                                    <span class="milestone-chip-text"><?= htmlspecialchars($chip) ?></span>
                                </span>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Academic Foundations & Core Disciplines (Essential Coursework Highlights) -->
    <div class="intro-coursework-summary">
        <div class="intro-coursework-header">
            <h3 class="intro-coursework-title">Academic Foundations &amp; Core Disciplines</h3>
            <span class="intro-coursework-subtitle">Key coursework competencies from BSIT 3rd Year studies at NU Baliwag</span>
        </div>

        <div class="academic-pillars-grid">
            <div class="academic-pillar-card">
                <div class="pillar-card-header">
                    <span class="pillar-tag">Web Systems</span>
                    <span class="pillar-course-code">IT 301</span>
                </div>
                <h4 class="pillar-title">Client-Server &amp; Dynamic Web</h4>
                <p class="pillar-desc">Dynamic full-stack development with server-side PHP 8 and relational MySQL, covering session lifecycle security, CRUD operations, and clean REST APIs.</p>
                <div class="pillar-skills">
                    <span class="pillar-skill-tag">PHP 8</span>
                    <span class="pillar-skill-tag">MySQL</span>
                    <span class="pillar-skill-tag">REST APIs</span>
                    <span class="pillar-skill-tag">Client-Server</span>
                </div>
            </div>

            <div class="academic-pillar-card">
                <div class="pillar-card-header">
                    <span class="pillar-tag">Databases</span>
                    <span class="pillar-course-code">IT 302</span>
                </div>
                <h4 class="pillar-title">Relational DBMS &amp; Normalization</h4>
                <p class="pillar-desc">Relational database modeling, ERD design, schema normalization (1NF–3NF), ACID transaction safety, and strict foreign key integrity constraints.</p>
                <div class="pillar-skills">
                    <span class="pillar-skill-tag">SQL</span>
                    <span class="pillar-skill-tag">3NF Normalization</span>
                    <span class="pillar-skill-tag">ERD Modeling</span>
                    <span class="pillar-skill-tag">ACID Integrity</span>
                </div>
            </div>

            <div class="academic-pillar-card">
                <div class="pillar-card-header">
                    <span class="pillar-tag">Analysis</span>
                    <span class="pillar-course-code">IT 304</span>
                </div>
                <h4 class="pillar-title">Systems Analysis &amp; Architecture</h4>
                <p class="pillar-desc">Software development lifecycles (SDLC), user requirements modeling, UML flowcharts, Data Flow Diagrams (DFD), and role state machine verification.</p>
                <div class="pillar-skills">
                    <span class="pillar-skill-tag">UML Diagrams</span>
                    <span class="pillar-skill-tag">Data Flow (DFD)</span>
                    <span class="pillar-skill-tag">Role Flowcharts</span>
                    <span class="pillar-skill-tag">SDLC Specs</span>
                </div>
            </div>

            <div class="academic-pillar-card">
                <div class="pillar-card-header">
                    <span class="pillar-tag">Networking</span>
                    <span class="pillar-course-code">IT 303</span>
                </div>
                <h4 class="pillar-title">Networking &amp; Infrastructure</h4>
                <p class="pillar-desc">OSI reference model, IPv4 variable-length subnetting, switch and router VLAN configuration, packet tracing, and access control principles.</p>
                <div class="pillar-skills">
                    <span class="pillar-skill-tag">TCP/IP</span>
                    <span class="pillar-skill-tag">IPv4 Subnetting</span>
                    <span class="pillar-skill-tag">VLAN Config</span>
                    <span class="pillar-skill-tag">LAN / WAN</span>
                </div>
            </div>
        </div>
    </div>

    <!-- SPA View Stepper Navigation -->
    <div class="spa-view-stepper" id="introStepper">
        <span class="stepper-placeholder" aria-hidden="true"></span>
        <a href="#projects" class="btn btn-secondary btn-sm spa-stepper-btn" data-section="projects">
            <span>Explore Projects</span>
            <span class="stepper-num">02</span>
            <?= render_icon('chevron-right') ?>
        </a>
    </div>
</section>
