<?php
/**
 * Resume Quick-View Modal Template
 * Accessible modal displaying professional qualifications, education, and credentials.
 */
?>
<div class="resume-modal-backdrop" id="resumeModal" aria-hidden="true" role="dialog" aria-modal="true" aria-labelledby="resumeModalTitle">
    <div class="resume-modal-dialog">
        <div class="resume-modal-header">
            <div>
                <span class="resume-modal-subtitle"><?= htmlspecialchars($data['site']['role']) ?></span>
                <h2 id="resumeModalTitle" class="resume-modal-title"><?= htmlspecialchars($data['site']['author']) ?>: Curriculum Vitae</h2>
            </div>
            <button type="button" class="modal-close-btn" id="closeResumeModalBtn" aria-label="Close CV preview">
                <?= render_icon('close') ?>
            </button>
        </div>

        <div class="resume-modal-body">
            <section class="resume-section">
                <h3 class="resume-section-heading">Professional Profile</h3>
                <p class="resume-summary-text"><?= htmlspecialchars($data['resume']['summary'] ?? '') ?></p>
            </section>

            <section class="resume-section">
                <h3 class="resume-section-heading">Core Competencies</h3>
                <div class="resume-competencies-grid">
                    <?php foreach ($data['resume']['core_competencies'] as $competency): ?>
                        <div class="resume-competency-item">
                            <?= render_icon('check') ?>
                            <span><?= htmlspecialchars($competency) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="resume-section">
                <h3 class="resume-section-heading">Key Career Milestones</h3>
                <div class="resume-milestones-list">
                    <?php foreach ($data['experience'] as $exp): ?>
                        <div class="resume-milestone-item">
                            <div class="resume-milestone-header">
                                <span class="resume-milestone-role"><?= htmlspecialchars($exp['role']) ?></span>
                                <span class="resume-milestone-period"><?= htmlspecialchars($exp['period']) ?></span>
                            </div>
                            <div class="resume-milestone-company"><?= htmlspecialchars($exp['organization'] ?? $exp['company'] ?? '') ?></div>
                            <p class="resume-milestone-desc"><?= htmlspecialchars($exp['description']) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="resume-section">
                <h3 class="resume-section-heading">Education &amp; Credentials</h3>
                <div class="resume-education-card">
                    <div class="resume-education-main">
                        <div class="resume-campus-logo-wrap" title="National University">
                            <?= render_icon('nu-logo', 'resume-campus-logo') ?>
                        </div>
                        <div>
                            <div class="resume-degree"><?= htmlspecialchars($data['resume']['education']['degree']) ?></div>
                            <div class="resume-institution"><?= htmlspecialchars($data['resume']['education']['institution']) ?></div>
                        </div>
                    </div>
                    <div class="resume-education-meta">
                        <span><?= htmlspecialchars($data['resume']['education']['period']) ?></span>
                        <span class="resume-honors-pill"><?= htmlspecialchars($data['resume']['education']['honors']) ?></span>
                    </div>
                </div>
            </section>
        </div>

        <div class="resume-modal-footer">
            <button type="button" class="btn btn-secondary btn-sm" id="closeResumeModalFooterBtn">Close</button>
            <button type="button" class="btn btn-primary btn-sm" onclick="window.print();">
                <?= render_icon('download') ?>
                <span>Print / Save PDF</span>
            </button>
        </div>
    </div>
</div>
