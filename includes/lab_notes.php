<?php
/**
 * Lab Notes & Developer Journal Template
 * Authentic student reflections, TIL posts, and engineering takeaways.
 */
?>
<section class="content-section" id="notes">
    <div class="section-heading">
        <h2 class="section-title">Lab Notes &amp; Learnings</h2>
        <p class="section-subtitle">
            Reflections from coursework lectures, late-night debugging sessions, and concepts that fundamentally changed how I think about computers.
        </p>
    </div>

    <!-- Student Engineering Lab Journal (Editorial Notebook Format) -->
    <div class="notes-journal">
        <?php foreach ($data['lab_notes'] as $idx => $note): ?>
            <article class="journal-entry">
                <div class="journal-gutter">
                    <span class="journal-index"><?= sprintf('%02d', $idx + 1) ?></span>
                    <time class="journal-date"><?= htmlspecialchars($note['date']) ?></time>
                </div>

                <div class="journal-body">
                    <div class="journal-meta">
                        <span class="journal-course-badge"><?= htmlspecialchars($note['course']) ?></span>
                        <span class="journal-tag"><?= htmlspecialchars($note['tag']) ?></span>
                    </div>

                    <h3 class="journal-title"><?= htmlspecialchars($note['title']) ?></h3>

                    <p class="journal-snippet"><?= htmlspecialchars($note['snippet']) ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <!-- SPA View Stepper Navigation -->
    <div class="spa-view-stepper">
        <a href="#projects" class="btn btn-secondary btn-sm spa-stepper-btn" data-section="projects">
            <?= render_icon('chevron-left') ?>
            <span class="stepper-num">03</span>
            <span>Projects</span>
        </a>
        <a href="#experience" class="btn btn-secondary btn-sm spa-stepper-btn" data-section="experience">
            <span>Campus &amp; Clubs</span>
            <span class="stepper-num">05</span>
            <?= render_icon('chevron-right') ?>
        </a>
    </div>
</section>
