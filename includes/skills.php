<?php
/**
 * Skills & Technical Competencies Section Template
 */
?>
<section class="section" id="skills">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Technical Foundations &amp; Tooling</h2>
            <p class="section-description">
                A growing toolkit of programming languages, web fundamentals, and development tools practiced through coursework and side projects.
            </p>
        </div>

        <div class="skills-container">
            <?php foreach ($data['skill_categories'] as $categoryName => $skills): ?>
                <div class="skill-category-card">
                    <h3 class="skill-category-title"><?= htmlspecialchars($categoryName) ?></h3>
                    
                    <div class="skill-list">
                        <?php foreach ($skills as $skill): ?>
                            <div class="skill-item">
                                <div class="skill-item-header">
                                    <span class="skill-item-name">
                                        <?= render_icon($skill['icon'] ?? 'code') ?>
                                        <?= htmlspecialchars($skill['name']) ?>
                                    </span>
                                    <span class="skill-item-percent"><?= (int)$skill['level'] ?>%</span>
                                </div>
                                <div class="skill-progress-bar" role="progressbar" aria-valuenow="<?= (int)$skill['level'] ?>" aria-valuemin="0" aria-valuemax="100" aria-label="<?= htmlspecialchars($skill['name']) ?> proficiency">
                                    <div class="skill-progress-fill" style="width: <?= (int)$skill['level'] ?>%;"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
