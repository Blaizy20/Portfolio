<?php
/**
 * Student Portfolio - John Senen Estrella
 * 3rd Year BSIT Student @ NU Baliwag
 * 
 * Main entry point. Loads data, helper utilities, sidebar shell,
 * and modular section templates.
 */

declare(strict_types=1);

$data = require __DIR__ . '/data.php';
require_once __DIR__ . '/includes/icons.php';

require __DIR__ . '/includes/header.php';
require __DIR__ . '/includes/sidebar.php';
?>
<main class="main-content staged-hidden" id="mainContent">
<?php
require __DIR__ . '/includes/intro.php';
require __DIR__ . '/includes/coursework.php';
require __DIR__ . '/includes/projects.php';
require __DIR__ . '/includes/lab_notes.php';
require __DIR__ . '/includes/experience.php';
require __DIR__ . '/includes/contact.php';
require __DIR__ . '/includes/resume_modal.php';
require __DIR__ . '/includes/mobile_nav.php';
require __DIR__ . '/includes/footer.php';
