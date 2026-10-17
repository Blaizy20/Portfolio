<?php
/**
 * Hero Section Template
 */
?>
<section class="section hero-section" id="hero">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-content">
                <div class="hero-status-pill">
                    <span class="status-indicator"></span>
                    <span><?= htmlspecialchars($data['site']['availability']) ?></span>
                </div>

                <h1 class="hero-headline">
                    Learning, Building &amp; Engineering for the Web.
                </h1>

                <p class="hero-subhead">
                    Hi, I'm <strong><?= htmlspecialchars($data['site']['author']) ?></strong>, a <?= htmlspecialchars($data['site']['role']) ?>. I build clean web applications, explore data structures, and contribute to student and open-source software.
                </p>

                <div class="hero-cta-group">
                    <a href="#projects" class="btn btn-primary">
                        <span>View Projects</span>
                        <?= render_icon('arrow-right') ?>
                    </a>
                    <a href="#contact" class="btn btn-secondary">
                        <?= render_icon('mail') ?>
                        <span>Get in Touch</span>
                    </a>
                </div>

                <div class="hero-socials">
                    <?php foreach ($data['socials'] as $social): ?>
                        <a href="<?= htmlspecialchars($social['url']) ?>" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="hero-social-link" 
                           aria-label="<?= htmlspecialchars($social['name']) ?>">
                            <?= render_icon($social['icon']) ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-card">
                    <div class="avatar-wrapper">
                        <div class="avatar-img-box">
                            <svg class="avatar-svg" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="50" cy="50" r="46" fill="#181a20" stroke="#2b2f3a" stroke-width="2"/>
                                <circle cx="50" cy="38" r="16" fill="#f3f4f6" />
                                <path d="M24 82C24 67.64 35.64 56 50 56C64.36 56 76 67.64 76 82V85H24V82Z" fill="#9ca3af" />
                                <circle cx="68" cy="32" r="3.5" fill="#ffffff" />
                            </svg>
                        </div>
                    </div>

                    <h2 class="hero-card-name"><?= htmlspecialchars($data['site']['author']) ?></h2>
                    <p class="hero-card-role"><?= htmlspecialchars($data['site']['role']) ?></p>

                    <div class="hero-card-meta">
                        <div class="hero-card-meta-item">
                            <?= render_icon('map-pin') ?>
                            <span><?= htmlspecialchars($data['site']['location']) ?></span>
                        </div>
                        <div class="hero-card-meta-item">
                            <?= render_icon('mail') ?>
                            <span><?= htmlspecialchars($data['site']['email']) ?></span>
                        </div>
                        <div class="hero-card-meta-item">
                            <?= render_icon('code') ?>
                            <span>PHP 8 · Python · JavaScript</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
