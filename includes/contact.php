<?php
/**
 * Contact Section & PHP Form Processing Template
 */

$formMessage = null;
$formStatus = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['student_contact_submit'])) {
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL) ?? '');
    $subject = trim(filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS) ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        $formStatus = 'error';
        $formMessage = 'Please fill out your name, email, and message.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formStatus = 'error';
        $formMessage = 'Please enter a valid email address so I can get back to you.';
    } else {
        $formStatus = 'success';
        $formMessage = 'Thanks for reaching out, ' . htmlspecialchars($name) . '! Your message was received. I will reply soon.';
    }
}
?>
<section class="content-section" id="contact">
    <div class="section-heading">
        <h2 class="section-title">Say Hello</h2>
        <p class="section-subtitle">
            Open to discussing 3rd year IT practicum (OJT) opportunities, academic collaborations, and coursework feedback. Feel free to reach out via the form below or directly through email.
        </p>
    </div>

    <div class="contact-layout">
        <!-- Direct Student Channels -->
        <div class="contact-details-box">
            <h3 class="contact-box-title">Direct Reach-out</h3>
            <p class="contact-box-desc">
                Always open to discussing software projects, IT practicum placement, and academic mentorship.
            </p>

            <div class="contact-methods">
                <a href="mailto:<?= htmlspecialchars($data['site']['email']) ?>" class="contact-method-card">
                    <div class="contact-method-icon">
                        <?= render_icon('mail') ?>
                    </div>
                    <div>
                        <div class="method-label">Direct Email</div>
                        <div class="method-val"><?= htmlspecialchars($data['site']['email']) ?></div>
                    </div>
                </a>

                <div class="contact-method-card">
                    <div class="contact-method-icon">
                        <?= render_icon('map-pin') ?>
                    </div>
                    <div>
                        <div class="method-label">Campus Location</div>
                        <div class="method-val"><?= htmlspecialchars($data['site']['location']) ?></div>
                    </div>
                </div>

                <div class="contact-method-card">
                    <div class="contact-method-icon">
                        <?= render_icon('book') ?>
                    </div>
                    <div>
                        <div class="method-label">Academic Program</div>
                        <div class="method-val"><?= htmlspecialchars(($data['site']['degree'] ?? 'BSIT') . ' · ' . ($data['site']['institution'] ?? 'NU Baliwag')) ?></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-box">
            <?php if ($formStatus && $formMessage): ?>
                <div class="form-alert alert-<?= $formStatus ?>" role="alert">
                    <?= $formMessage ?>
                </div>
            <?php endif; ?>

            <form action="#contact" method="POST" class="student-form" novalidate>
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="contactName" class="form-label">Your Name <span class="required">*</span></label>
                        <input type="text" 
                               id="contactName" 
                               name="name" 
                               class="form-control" 
                               required 
                               placeholder="Juan Dela Cruz"
                               value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                    </div>

                    <div class="form-group">
                        <label for="contactEmail" class="form-label">Your Email <span class="required">*</span></label>
                        <input type="email" 
                               id="contactEmail" 
                               name="email" 
                               class="form-control" 
                               required 
                               placeholder="juandelacruz@example.com"
                               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="contactSubject" class="form-label">Subject</label>
                    <input type="text" 
                           id="contactSubject" 
                           name="subject" 
                           class="form-control" 
                           placeholder="Practicum / OJT Inquiry or Project Discussion"
                           value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>">
                </div>

                <div class="form-group">
                    <label for="contactMessage" class="form-label">Message <span class="required">*</span></label>
                    <textarea id="contactMessage" 
                              name="message" 
                              class="form-control form-textarea" 
                              rows="5" 
                              required 
                              placeholder="Hi John, I saw your work on CredenceLend and would like to connect about an internship opportunity."><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                </div>

                <button type="submit" name="student_contact_submit" value="1" class="btn btn-primary submit-btn">
                    <span>Send Note</span>
                    <?= render_icon('send') ?>
                </button>
            </form>
        </div>
    </div>

    <!-- SPA View Stepper Navigation -->
    <div class="spa-view-stepper">
        <a href="#projects" class="btn btn-secondary btn-sm spa-stepper-btn" data-section="projects">
            <?= render_icon('chevron-left') ?>
            <span class="stepper-num">02</span>
            <span>Projects</span>
        </a>
        <a href="#intro" class="btn btn-secondary btn-sm spa-stepper-btn" data-section="intro">
            <span>Back to Intro</span>
            <span class="stepper-num">01</span>
            <?= render_icon('chevron-right') ?>
        </a>
    </div>
</section>
