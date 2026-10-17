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
                <span class="typewriter-text" id="typewriterText">Building web systems, database architectures, and IT solutions.</span>
                <span class="typewriter-cursor" id="typewriterCursor" aria-hidden="true"></span>
            </h2>
            <p class="intro-lead" id="introLeadText">
                <span class="typewriter-text" id="typewriterLeadText">Hi, I'm <strong><?= htmlspecialchars($data['site']['author']) ?></strong>. I'm a 3rd year college student taking Bachelor of Science in Information Technology (BSIT) at National University (NU) Baliwag. This is my student portfolio: a place where I document coursework, projects, and the skills I'm developing along the way.</span>
                <span class="typewriter-cursor is-hidden" id="typewriterLeadCursor" aria-hidden="true"></span>
            </p>
            <p class="intro-subtext staged-subtext-hidden" id="introSubtext">
                Currently focused on web systems development with PHP and MySQL, network administration and simulation in Cisco Packet Tracer, systems analysis, and building clean, reliable tools.
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

                <div class="milestone-value"><?= htmlspecialchars($milestone['value']) ?></div>
                <div class="milestone-label"><?= htmlspecialchars($milestone['label']) ?></div>
                <div class="milestone-detail"><?= htmlspecialchars($milestone['detail']) ?></div>

                <?php if (!empty($milestone['chips'])): ?>
                    <div class="milestone-chips-row">
                        <?php foreach ($milestone['chips'] as $chip): ?>
                            <span class="milestone-chip"><?= htmlspecialchars($chip) ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>



    <!-- SPA View Stepper Navigation -->
    <div class="spa-view-stepper" id="introStepper">
        <span class="stepper-placeholder" aria-hidden="true"></span>
        <a href="#coursework" class="btn btn-secondary btn-sm spa-stepper-btn" data-section="coursework">
            <span>Explore Coursework</span>
            <span class="stepper-num">02</span>
            <?= render_icon('chevron-right') ?>
        </a>
    </div>
</section>
