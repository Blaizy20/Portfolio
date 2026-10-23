<?php
/**
 * Site Sidebar Template - Streamlined Collapsible Navigation
 * Displays only the 01-06 section navigation with smooth collapse/expand functionality.
 */
?>
<aside class="site-sidebar staged-hidden" id="siteSidebar" aria-label="Sections Navigation">
    <div class="sidebar-inner">
        <!-- Mobile Drawer Close Button -->
        <button type="button" class="sidebar-close-btn" id="sidebarCloseBtn" aria-label="Close navigation drawer">
            <?= render_icon('close') ?>
        </button>

        <!-- In-Sidebar Section Header with Dedicated Collapse Button -->
        <div class="sidebar-header-row">
            <span class="sidebar-header-title">Sections</span>
            <div class="sidebar-header-actions">
                <span class="sidebar-header-badge" aria-hidden="true">01–03</span>
                <button type="button" class="sidebar-collapse-btn" id="sidebarCollapseBtn" aria-label="Collapse navigation bar" title="Collapse navigation (Ctrl+B)">
                    <span class="icon-collapse"><?= render_icon('sidebar-collapse') ?></span>
                    <span class="icon-expand"><?= render_icon('sidebar-expand') ?></span>
                </button>
            </div>
        </div>

        <!-- Section Navigation: 01 - 03 Only -->
        <nav class="sidebar-nav" aria-label="Sections">
            <ul class="sidebar-nav-list" id="sidebarNavList">
                <li>
                    <a href="#intro" class="sidebar-nav-link active" data-section="intro" data-title="Introduction">
                        <span class="nav-num">01</span>
                        <span class="nav-text">Introduction</span>
                        <span class="nav-tooltip" aria-hidden="true">01 · Introduction</span>
                    </a>
                </li>
                <li>
                    <a href="#projects" class="sidebar-nav-link" data-section="projects" data-title="Projects">
                        <span class="nav-num">02</span>
                        <span class="nav-text">Projects</span>
                        <span class="nav-tooltip" aria-hidden="true">02 · Projects</span>
                    </a>
                </li>
                <li>
                    <a href="#contact" class="sidebar-nav-link" data-section="contact" data-title="Contact">
                        <span class="nav-num">03</span>
                        <span class="nav-text">Contact</span>
                        <span class="nav-tooltip" aria-hidden="true">03 · Contact</span>
                    </a>
                </li>
                <!-- Physical Sliding Liquid Glass Selector Indicator -->
                <div class="sidebar-liquid-glass-indicator" id="sidebarGlassIndicator" aria-hidden="true"></div>
            </ul>
        </nav>
    </div>
</aside>
<div class="sidebar-overlay" id="sidebarOverlay" aria-hidden="true"></div>
