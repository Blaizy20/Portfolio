<?php
/**
 * Site Header Template
 * Contains HTML <head>, accessibility skip link, and sleek top navigation bar
 * housing the logo/branding, sidebar collapse toggle, external links, and theme switcher.
 */
?>
<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover, interactive-widget=resizes-content">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="#f8f9fa">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="#0c0d11">
    <meta name="color-scheme" content="dark light">
    <title><?= htmlspecialchars($data['site']['title']) ?></title>
    <meta name="description" content="<?= htmlspecialchars($data['site']['meta_description']) ?>">
    <meta name="author" content="<?= htmlspecialchars($data['site']['author']) ?>">

    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= htmlspecialchars($data['site']['title']) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($data['site']['meta_description']) ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300..700;1,9..40,300..700&family=Outfit:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style.css">
    
    <noscript>
        <style>
            .welcome-screen { display: none !important; }
            .site-header.staged-hidden,
            .site-sidebar.staged-hidden,
            .main-content.staged-hidden,
            .mobile-bottom-nav.staged-hidden {
                opacity: 1 !important;
                transform: none !important;
                filter: none !important;
                pointer-events: auto !important;
            }
        </style>
    </noscript>
</head>
<body class="welcome-locked">

<?php require_once __DIR__ . '/welcome_screen.php'; ?>
<?php // Interactive tour disabled for now as per user request: require_once __DIR__ . '/game_hud.php'; ?>

<a href="#mainContent" class="skip-link">Skip to main content</a>

<!-- Sleek Top Header: Brand, Theme Toggle & Utility Controls -->
<header class="site-header staged-hidden" id="siteHeader">
    <div class="header-inner">
        <div class="header-left">
            <a href="#intro" class="header-brand" aria-label="<?= htmlspecialchars($data['site']['author']) ?> - Home">
                <span class="header-brand-badge"><?= strtoupper(substr($data['site']['author'], 0, 1)) ?></span>
                <span class="header-brand-name"><?= htmlspecialchars($data['site']['author']) ?></span>
            </a>
        </div>

        <div class="header-right">
            <?php /* Tour button disabled for now as per user request:
            <button type="button" class="header-icon-btn hud-toggle-btn" id="hudReopenBtn" aria-label="Portfolio tour and interface guide" title="Interface Tour (H)">
                <?= render_icon('compass') ?>
            </button>
            */ ?>

            <a href="<?= htmlspecialchars($data['socials']['github']['url']) ?>" 
               target="_blank" 
               rel="noopener noreferrer" 
               class="header-icon-btn" 
               aria-label="GitHub Profile" 
               title="GitHub">
                <?= render_icon('github') ?>
            </a>

            <button type="button" class="btn btn-secondary btn-sm header-resume-btn" id="openResumeModalBtn" aria-haspopup="dialog" aria-expanded="false" aria-controls="resumeModal">
                <?= render_icon('download') ?>
                <span>Resume</span>
            </button>

            <button type="button" class="theme-toggle-btn" id="themeToggleBtn" aria-label="Toggle dark/light mode" title="Toggle theme">
                <span class="icon-sun"><?= render_icon('sun') ?></span>
                <span class="icon-moon"><?= render_icon('moon') ?></span>
            </button>

            <button type="button" class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle navigation drawer" aria-expanded="false" aria-controls="siteSidebar">
                <?= render_icon('menu') ?>
            </button>
        </div>
    </div>
</header>

<div class="site-shell" id="siteShell">
