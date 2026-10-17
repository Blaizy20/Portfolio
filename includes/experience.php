<?php
/**
 * Campus Experience & Community Involvement Template
 * Realistic student timeline: teaching assistantships, campus clubs, and hackathons.
 */
?>
<section class="content-section" id="experience">
    <div class="section-heading">
        <h2 class="section-title">Campus &amp; Student Involvement</h2>
        <p class="section-subtitle">
            Teaching assistant hours, student engineering clubs, and hackathons where I collaborate with peers outside the classroom.
        </p>
    </div>

    <div class="experience-timeline">
        <?php foreach ($data['experience'] as $exp): ?>
            <article class="exp-timeline-item">
                <div class="exp-dot" aria-hidden="true"></div>
                <div class="exp-card">
                    <div class="exp-header">
                        <div>
                            <h3 class="exp-role"><?= htmlspecialchars($exp['role']) ?></h3>
                            <div class="exp-org"><?= htmlspecialchars($exp['organization']) ?> · <span class="exp-type"><?= htmlspecialchars($exp['type']) ?></span></div>
                        </div>
                        <span class="exp-period"><?= htmlspecialchars($exp['period']) ?></span>
                    </div>

                    <p class="exp-desc"><?= htmlspecialchars($exp['description']) ?></p>

                    <?php if (!empty($exp['bullets'])): ?>
                        <ul class="exp-bullets">
                            <?php foreach ($exp['bullets'] as $bullet): ?>
                                <li class="exp-bullet-item">
                                    <span class="exp-bullet-icon">›</span>
                                    <span><?= htmlspecialchars($bullet) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <!-- Student Growth & Next Learning Goals -->
    <div class="student-growth-card">
        <span class="growth-card-badge">Looking Forward</span>
        <h3 class="growth-card-title">Where I Want to Grow Next</h3>
        <p class="growth-card-text">
            As a 3rd year BSIT student preparing for our capstone project and incoming industry practicum (OJT), I am actively sharpening my focus on:
        </p>
        <div class="growth-goals-grid">
            <div class="growth-goal-item">
                <span class="growth-goal-num">01</span>
                <div>
                    <h4 class="growth-goal-title">Full-Stack Web &amp; Database Systems</h4>
                    <p class="growth-goal-desc">Designing robust PHP and MySQL architectures with parameterized PDO queries, normalized schemas, and RESTful endpoints.</p>
                </div>
            </div>
            <div class="growth-goal-item">
                <span class="growth-goal-num">02</span>
                <div>
                    <h4 class="growth-goal-title">Enterprise Networking &amp; Security</h4>
                    <p class="growth-goal-desc">Gaining practical proficiency in Cisco Packet Tracer, VLAN segmentation, subnet routing, and system hardening.</p>
                </div>
            </div>
            <div class="growth-goal-item">
                <span class="growth-goal-num">03</span>
                <div>
                    <h4 class="growth-goal-title">Industry Practicum / OJT Placement</h4>
                    <p class="growth-goal-desc">Joining an IT team for hands-on on-the-job training where I can contribute to production systems and learn real-world workflows.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- SPA View Stepper Navigation -->
    <div class="spa-view-stepper">
        <a href="#notes" class="btn btn-secondary btn-sm spa-stepper-btn" data-section="notes">
            <?= render_icon('chevron-left') ?>
            <span class="stepper-num">04</span>
            <span>Lab Notes</span>
        </a>
        <a href="#contact" class="btn btn-secondary btn-sm spa-stepper-btn" data-section="contact">
            <span>Get in Touch</span>
            <span class="stepper-num">06</span>
            <?= render_icon('chevron-right') ?>
        </a>
    </div>
</section>
