<?php
/**
 * Projects Section Template - Student Portfolio Edition
 * Interactive project cards with dual-mode view: "Overview" and "What Broke & Learned".
 */

/**
 * Render technical architectural diagram for student projects
 */
function render_student_project_diagram(string $id): string {
    switch ($id) {
        case 'credencelend':
            return <<<SVG
            <svg class="project-diagram-svg" viewBox="0 0 540 140" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <!-- Staff Portal & Mobile -->
                <rect x="15" y="25" width="145" height="90" rx="8" fill="rgba(20,22,30,0.85)" stroke="#3b82f6" stroke-width="1.4"/>
                <text x="87.5" y="50" fill="#f3f4f6" font-size="12" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" text-anchor="middle">Staff Web Portal</text>
                <text x="87.5" y="68" fill="#93c5fd" font-size="10" font-family="'JetBrains Mono', monospace" text-anchor="middle">Admin &amp; Cashier</text>
                <line x1="30" y1="78" x2="145" y2="78" stroke="rgba(255,255,255,0.1)"/>
                <text x="87.5" y="96" fill="#a1a1aa" font-size="10" font-family="'JetBrains Mono', monospace" text-anchor="middle">Mobile Member App</text>

                <!-- Arrow 1 (Cleanly positioned in 35px gap) -->
                <line x1="163" y1="70" x2="191" y2="70" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-dasharray="3 3"/>
                <polygon points="189,66 195,70 189,74" fill="#ffffff"/>

                <!-- REST API & Tenant Middleware -->
                <rect x="195" y="25" width="150" height="90" rx="8" fill="rgba(255,255,255,0.06)" stroke="#8b5cf6" stroke-width="1.5"/>
                <text x="270" y="52" fill="#ffffff" font-size="12.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" text-anchor="middle">RESTful API Core</text>
                <text x="270" y="74" fill="#c4b5fd" font-size="10" font-family="'JetBrains Mono', monospace" text-anchor="middle">Tenant Middleware</text>
                <text x="270" y="94" fill="#9ca3af" font-size="10" font-family="'JetBrains Mono', monospace" text-anchor="middle">Role-Based Guard</text>

                <!-- Arrow 2 (Cleanly positioned in 35px gap) -->
                <line x1="348" y1="70" x2="376" y2="70" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-dasharray="3 3"/>
                <polygon points="374,66 380,70 374,74" fill="#ffffff"/>

                <!-- Multi-Tenant MySQL -->
                <rect x="380" y="25" width="145" height="90" rx="8" fill="rgba(20,22,30,0.85)" stroke="#0ea5e9" stroke-width="1.4"/>
                <text x="452.5" y="52" fill="#f3f4f6" font-size="12.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" text-anchor="middle">Multi-Tenant DB</text>
                <text x="452.5" y="74" fill="#7dd3fc" font-size="10.5" font-family="'JetBrains Mono', monospace" text-anchor="middle">MySQL Schema</text>
                <text x="452.5" y="94" fill="#9ca3af" font-size="10" font-family="'JetBrains Mono', monospace" text-anchor="middle">FK Audit Ledgers</text>
            </svg>
SVG;

        case 'citywatch':
            return <<<SVG
            <svg class="project-diagram-svg" viewBox="0 0 540 140" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <!-- Resident UI -->
                <rect x="15" y="25" width="145" height="90" rx="8" fill="rgba(20,22,30,0.85)" stroke="#f59e0b" stroke-width="1.4"/>
                <text x="87.5" y="52" fill="#f3f4f6" font-size="12.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" text-anchor="middle">Resident UI / UX</text>
                <text x="87.5" y="74" fill="#fcd34d" font-size="10.5" font-family="'JetBrains Mono', monospace" text-anchor="middle">Incident Reporting</text>
                <text x="87.5" y="94" fill="#9ca3af" font-size="10" font-family="'JetBrains Mono', monospace" text-anchor="middle">GPS Geolocation</text>

                <!-- Arrow 1 -->
                <line x1="163" y1="70" x2="191" y2="70" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-dasharray="3 3"/>
                <polygon points="189,66 195,70 189,74" fill="#ffffff"/>

                <!-- Leaflet Mapping & Django Engine -->
                <rect x="195" y="25" width="150" height="90" rx="8" fill="rgba(255,255,255,0.06)" stroke="#10b981" stroke-width="1.5"/>
                <text x="270" y="52" fill="#ffffff" font-size="12.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" text-anchor="middle">Leaflet.js Engine</text>
                <text x="270" y="74" fill="#6ee7b7" font-size="10.5" font-family="'JetBrains Mono', monospace" text-anchor="middle">Map Coordinate Pin</text>
                <text x="270" y="94" fill="#9ca3af" font-size="10" font-family="'JetBrains Mono', monospace" text-anchor="middle">Django API Core</text>

                <!-- Arrow 2 -->
                <line x1="348" y1="70" x2="376" y2="70" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-dasharray="3 3"/>
                <polygon points="374,66 380,70 374,74" fill="#ffffff"/>

                <!-- Municipal Analytics -->
                <rect x="380" y="25" width="145" height="90" rx="8" fill="rgba(20,22,30,0.85)" stroke="#38bdf8" stroke-width="1.4"/>
                <text x="452.5" y="52" fill="#f3f4f6" font-size="12.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" text-anchor="middle">Municipal Dash</text>
                <text x="452.5" y="74" fill="#7dd3fc" font-size="10.5" font-family="'JetBrains Mono', monospace" text-anchor="middle">Live Heatmaps</text>
                <text x="452.5" y="94" fill="#9ca3af" font-size="10" font-family="'JetBrains Mono', monospace" text-anchor="middle">Resolution Stats</text>
            </svg>
SVG;

        case 'final-project':
            return <<<SVG
            <svg class="project-diagram-svg" viewBox="0 0 540 140" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <!-- System Specifications -->
                <rect x="15" y="25" width="145" height="90" rx="8" fill="rgba(20,22,30,0.85)" stroke="#ec4899" stroke-width="1.4"/>
                <text x="87.5" y="52" fill="#f3f4f6" font-size="12.5" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" text-anchor="middle">System Specs</text>
                <text x="87.5" y="74" fill="#f472b6" font-size="10.5" font-family="'JetBrains Mono', monospace" text-anchor="middle">Role Flowcharts</text>
                <text x="87.5" y="94" fill="#9ca3af" font-size="10" font-family="'JetBrains Mono', monospace" text-anchor="middle">Transition Matrix</text>

                <!-- Arrow 1 -->
                <line x1="163" y1="70" x2="191" y2="70" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-dasharray="3 3"/>
                <polygon points="189,66 195,70 189,74" fill="#ffffff"/>

                <!-- SQL Validation Suite -->
                <rect x="195" y="25" width="150" height="90" rx="8" fill="rgba(255,255,255,0.06)" stroke="#ffffff" stroke-width="1.5"/>
                <text x="270" y="52" fill="#ffffff" font-size="12" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" text-anchor="middle">SQL Validation</text>
                <text x="270" y="74" fill="#e0e7ff" font-size="10" font-family="'JetBrains Mono', monospace" text-anchor="middle">FK Integrity Suite</text>
                <text x="270" y="94" fill="#9ca3af" font-size="9.5" font-family="'JetBrains Mono', monospace" text-anchor="middle">Ledger Audit Queries</text>

                <!-- Arrow 2 -->
                <line x1="348" y1="70" x2="376" y2="70" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-dasharray="3 3"/>
                <polygon points="374,66 380,70 374,74" fill="#ffffff"/>

                <!-- Railway Deployment -->
                <rect x="380" y="25" width="145" height="90" rx="8" fill="rgba(20,22,30,0.85)" stroke="#818cf8" stroke-width="1.4"/>
                <text x="452.5" y="52" fill="#f3f4f6" font-size="12" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" text-anchor="middle">Railway Cloud</text>
                <text x="452.5" y="74" fill="#c7d2fe" font-size="10" font-family="'JetBrains Mono', monospace" text-anchor="middle">Automated CD</text>
                <text x="452.5" y="94" fill="#9ca3af" font-size="9.5" font-family="'JetBrains Mono', monospace" text-anchor="middle">Live Verification</text>
            </svg>
SVG;

        case 'portfolio-site':
            return <<<SVG
            <svg class="project-diagram-svg" viewBox="0 0 540 140" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <!-- Browser Client -->
                <rect x="15" y="25" width="145" height="90" rx="8" fill="rgba(20,22,30,0.85)" stroke="#a1a1aa" stroke-width="1.2"/>
                <text x="87.5" y="52" fill="#f3f4f6" font-size="12" font-family="'Plus Jakarta Sans', sans-serif" font-weight="600" text-anchor="middle">Browser Client</text>
                <text x="87.5" y="74" fill="#d1d5db" font-size="10" font-family="'JetBrains Mono', monospace" text-anchor="middle">Semantic HTML5</text>
                <text x="87.5" y="94" fill="#9ca3af" font-size="9.5" font-family="'JetBrains Mono', monospace" text-anchor="middle">Zero Dependencies</text>

                <!-- Arrow 1 -->
                <line x1="163" y1="70" x2="191" y2="70" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-dasharray="3 3"/>
                <polygon points="189,66 195,70 189,74" fill="#ffffff"/>

                <!-- SSR Engine -->
                <rect x="195" y="25" width="150" height="90" rx="8" fill="rgba(255,255,255,0.06)" stroke="#ffffff" stroke-width="1.5"/>
                <text x="270" y="52" fill="#ffffff" font-size="12" font-family="'Plus Jakarta Sans', sans-serif" font-weight="700" text-anchor="middle">Vanilla PHP Core</text>
                <text x="270" y="74" fill="#e0e7ff" font-size="10" font-family="'JetBrains Mono', monospace" text-anchor="middle">data.php &amp; Partials</text>
                <text x="270" y="94" fill="#9ca3af" font-size="9.5" font-family="'JetBrains Mono', monospace" text-anchor="middle">WCAG 2.1 AA</text>

                <!-- Arrow 2 -->
                <line x1="348" y1="70" x2="376" y2="70" stroke="rgba(255,255,255,0.7)" stroke-width="1.5" stroke-dasharray="3 3"/>
                <polygon points="374,66 380,70 374,74" fill="#ffffff"/>

                <!-- SPA View Controller -->
                <rect x="380" y="25" width="145" height="90" rx="8" fill="rgba(20,22,30,0.85)" stroke="#a1a1aa" stroke-width="1.2"/>
                <text x="452.5" y="52" fill="#f3f4f6" font-size="12" font-family="'Plus Jakarta Sans', sans-serif" font-weight="600" text-anchor="middle">SPA Router</text>
                <text x="452.5" y="74" fill="#a7f3d0" font-size="10" font-family="'JetBrains Mono', monospace" text-anchor="middle">History &amp; Hash API</text>
                <text x="452.5" y="94" fill="#9ca3af" font-size="9.5" font-family="'JetBrains Mono', monospace" text-anchor="middle">No Page Reload</text>
            </svg>
SVG;

        default:
            return '';
    }
}
?>
<section class="content-section" id="projects">
    <div class="section-heading">
        <h2 class="section-title">Projects &amp; Systems</h2>
        <p class="section-subtitle">
            Core systems developed across multi-tenant financial technology, civic incident reporting, and modern web architectures. Toggle between Overview, Technical Details, and What Broke &amp; Learned on any card.
        </p>
    </div>

    <div class="projects-list">
        <?php foreach ($data['projects'] as $project): 
            $pid = $project['id'];
            $variantClass = 'student-project-card';
            if ($pid === 'credencelend') {
                $variantClass .= ' project-featured-card';
            } elseif ($pid === 'citywatch') {
                $variantClass .= ' project-split-card';
            } elseif ($pid === 'final-project') {
                $variantClass .= ' project-terminal-card';
            } elseif ($pid === 'portfolio-site') {
                $variantClass .= ' project-canvas-card';
            }
        ?>
            <article class="<?= $variantClass ?>" id="project-<?= htmlspecialchars($project['id']) ?>">
                <div class="project-header">
                    <div>
                        <div class="project-meta-line">
                            <span class="project-badge"><?= htmlspecialchars($project['badge']) ?></span>
                            <span class="project-category-text"><?= htmlspecialchars($project['category']) ?></span>
                        </div>
                        <h3 class="project-title"><?= htmlspecialchars($project['title']) ?></h3>
                        <p class="project-subtitle"><?= htmlspecialchars($project['subtitle']) ?></p>
                    </div>

                    <div class="project-links">
                        <a href="<?= htmlspecialchars($project['github_url']) ?>" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="btn-icon-link" 
                           aria-label="View source code on GitHub">
                            <?= render_icon('github') ?>
                            <span>Code</span>
                        </a>
                        <a href="<?= htmlspecialchars($project['live_url']) ?>" 
                           target="_blank" 
                           rel="noopener noreferrer" 
                           class="btn-icon-link" 
                           aria-label="View live project demo">
                            <?= render_icon('external-link') ?>
                            <span>Demo</span>
                        </a>
                    </div>
                </div>

                <!-- Interactive Mode Tabs -->
                <div class="project-tabs" role="tablist" aria-label="Project card view modes">
                    <button type="button" 
                            class="project-tab-btn active" 
                            data-tab="overview" 
                            role="tab" 
                            aria-selected="true">
                        Overview &amp; Diagram
                    </button>
                    <button type="button" 
                            class="project-tab-btn" 
                            data-tab="retrospective" 
                            role="tab" 
                            aria-selected="false">
                        What Broke &amp; Key Lessons
                    </button>
                </div>

                <!-- Tab 1: Overview & Diagram -->
                <div class="project-tab-content tab-overview active">
                    <p class="project-context"><?= htmlspecialchars($project['context']) ?></p>

                    <?php if ($pid === 'credencelend'): ?>
                        <div class="project-ledger-badge" aria-label="Multi-Tenant Architecture">
                            <span>PHP 8.2 PDO &middot; Multi-Tenant Isolation Middleware &middot; Role-Based Workflows</span>
                        </div>
                    <?php elseif ($pid === 'citywatch'): ?>
                        <div class="project-ledger-badge" aria-label="Geospatial Architecture">
                            <span>Leaflet.js Geospatial &middot; Django REST Core &middot; Municipal Incident Heatmaps</span>
                        </div>
                    <?php elseif ($pid === 'final-project'): ?>
                        <div class="project-cli-header" aria-label="SQL Validation &amp; Specification Suite">
                            <span class="cli-prompt">mysql -u root -p</span>
                            <span class="cli-cmd">SOURCE SQL_VALIDATION_QUERIES.sql;</span>
                            <span class="cli-result">[Status: Pass] 100% Constraints Verified</span>
                        </div>
                    <?php elseif ($pid === 'portfolio-site'): ?>
                        <div class="project-algo-metrics" aria-label="Architecture Metrics">
                            <span class="metric-pill">Zero Build Tools</span>
                            <span class="metric-pill">Sub-20ms SSR</span>
                            <span class="metric-pill">WCAG 2.1 AA Compliant</span>
                        </div>
                    <?php endif; ?>

                    <div class="project-diagram-box">
                        <?= render_student_project_diagram($project['id']) ?>
                    </div>

                    <div class="project-tags">
                        <?php foreach ($project['tags'] as $tag): ?>
                            <span class="tech-tag"><?= htmlspecialchars($tag) ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Tab 2: Retrospective (The Struggle & Takeaways) -->
                <div class="project-tab-content tab-retrospective">
                    <div class="retrospective-box">
                        <div class="retro-section">
                            <h4 class="retro-heading">The Hard Part &amp; What Broke</h4>
                            <p class="retro-body"><?= htmlspecialchars($project['what_broke']) ?></p>
                        </div>

                        <div class="retro-section">
                            <h4 class="retro-heading">What I Learned From It</h4>
                            <p class="retro-body"><?= htmlspecialchars($project['takeaway']) ?></p>
                        </div>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <!-- SPA View Stepper Navigation -->
    <div class="spa-view-stepper">
        <a href="#intro" class="btn btn-secondary btn-sm spa-stepper-btn" data-section="intro">
            <?= render_icon('chevron-left') ?>
            <span class="stepper-num">01</span>
            <span>Introduction</span>
        </a>
        <a href="#contact" class="btn btn-secondary btn-sm spa-stepper-btn" data-section="contact">
            <span>Get in Touch</span>
            <span class="stepper-num">03</span>
            <?= render_icon('chevron-right') ?>
        </a>
    </div>
</section>
