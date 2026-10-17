<?php
/**
 * About & Stats Section Template
 */
?>
<section class="section section-alt" id="about">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Foundations in Computer Science &amp; Practical Web Development</h2>
            <p class="section-description">
                I am a passionate CS student focused on writing clean, accessible code, understanding system fundamentals, and turning classroom concepts into working software.
            </p>
        </div>

        <div class="stats-grid">
            <?php foreach ($data['stats'] as $stat): ?>
                <div class="stat-card">
                    <div class="stat-number"><?= htmlspecialchars($stat['number']) ?></div>
                    <div class="stat-label"><?= htmlspecialchars($stat['label']) ?></div>
                    <div class="stat-desc"><?= htmlspecialchars($stat['description']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
