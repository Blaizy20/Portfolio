<?php
/**
 * General Profile Card Template
 * Persistent left-anchored student profile component on desktop,
 * providing immediate biographical clarity while the content stream scrolls on the right.
 */
?>
<aside class="profile-sidebar" aria-label="<?= htmlspecialchars($data['site']['author']) ?> Profile">
    <div class="profile-card-inner">
        <!-- Avatar & Student Identity -->
        <div class="profile-avatar-row">
            <div class="profile-avatar-box">
                <div class="profile-avatar-monogram">JSE</div>
            </div>
            <div class="profile-status-badge">
                <span class="status-dot"></span>
                <span>BSIT '27</span>
            </div>
        </div>

        <div class="profile-meta">
            <h1 class="profile-name"><?= htmlspecialchars($data['site']['author']) ?></h1>
            <div class="profile-role"><?= htmlspecialchars($data['site']['role']) ?></div>
            <div class="profile-term"><?= htmlspecialchars($data['site']['term']) ?></div>
        </div>

        <p class="profile-bio">
            3rd year college student taking the program of BSIT at NU Baliwag. Passionate about web development, relational database systems, network infrastructure, and building practical software tools.
        </p>

        <!-- Academic Milestones Grid -->
        <div class="profile-milestones">
            <?php foreach ($data['student_milestones'] as $milestone): ?>
                <div class="profile-milestone-item">
                    <div class="milestone-num"><?= htmlspecialchars($milestone['value']) ?></div>
                    <div class="milestone-lbl"><?= htmlspecialchars($milestone['label']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Quick Profile Actions -->
        <div class="profile-actions">
            <a href="#contact" class="btn btn-primary btn-sm profile-cta">
                <?= render_icon('mail') ?>
                <span>Get in Touch</span>
            </a>
            <button type="button" class="btn btn-secondary btn-sm" id="profileResumeBtn" aria-haspopup="dialog" aria-expanded="false" aria-controls="resumeModal">
                <?= render_icon('download') ?>
                <span>CV</span>
            </button>
        </div>

        <!-- Contact Channels & Socials -->
        <div class="profile-footer">
            <div class="profile-contact-line">
                <span class="contact-lbl">Email</span>
                <a href="mailto:<?= htmlspecialchars($data['site']['email']) ?>" class="contact-val">
                    <?= htmlspecialchars($data['site']['email']) ?>
                </a>
            </div>
            <div class="profile-contact-line">
                <span class="contact-lbl">Location</span>
                <span class="contact-val"><?= htmlspecialchars($data['site']['location']) ?></span>
            </div>

            <div class="profile-socials">
                <?php foreach ($data['socials'] as $social): ?>
                    <a href="<?= htmlspecialchars($social['url']) ?>" 
                       target="_blank" 
                       rel="noopener noreferrer" 
                       class="profile-social-link" 
                       aria-label="<?= htmlspecialchars($social['name']) ?>"
                       title="<?= htmlspecialchars($social['name']) ?>">
                        <?= render_icon($social['icon']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</aside>
