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
        case 'campus-portal':
            return <<<SVG
            <svg class="project-diagram-svg" viewBox="0 0 460 150" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <!-- Browser Client -->
                <rect x="20" y="45" width="105" height="60" rx="6" fill="rgba(20,22,30,0.8)" stroke="#a1a1aa" stroke-width="1.2"/>
                <text x="72" y="72" fill="#f3f4f6" font-size="13" font-family="'Outfit', sans-serif" font-weight="600" text-anchor="middle">Student UI</text>
                <text x="72" y="90" fill="#a1a1aa" font-size="12" font-family="'JetBrains Mono', monospace" text-anchor="middle">Forms &amp; Session</text>

                <!-- Arrow 1 -->
                <line x1="130" y1="75" x2="165" y2="75" stroke="#ffffff" stroke-width="1.5" stroke-dasharray="3 3"/>
                <polygon points="163,71 170,75 163,79" fill="#ffffff"/>

                <!-- PHP 8 PDO Application Server -->
                <rect x="175" y="40" width="130" height="70" rx="6" fill="rgba(255,255,255,0.06)" stroke="#ffffff" stroke-width="1.5"/>
                <text x="240" y="68" fill="#ffffff" font-size="13" font-family="'Outfit', sans-serif" font-weight="700" text-anchor="middle">PHP 8 PDO Layer</text>
                <text x="240" y="86" fill="#d1d5db" font-size="12" font-family="'JetBrains Mono', monospace" text-anchor="middle">Prepared Queries</text>
                <text x="240" y="100" fill="#a1a1aa" font-size="11" font-family="'JetBrains Mono', monospace" text-anchor="middle">Role-Based Auth</text>

                <!-- Arrow 2 -->
                <line x1="310" y1="75" x2="345" y2="75" stroke="#ffffff" stroke-width="1.5" stroke-dasharray="3 3"/>
                <polygon points="343,71 350,75 343,79" fill="#ffffff"/>

                <!-- MySQL Database -->
                <rect x="355" y="45" width="90" height="60" rx="6" fill="rgba(20,22,30,0.8)" stroke="#a1a1aa" stroke-width="1.2"/>
                <text x="400" y="72" fill="#f3f4f6" font-size="13" font-family="'Outfit', sans-serif" font-weight="600" text-anchor="middle">MySQL</text>
                <text x="400" y="90" fill="#a1a1aa" font-size="12" font-family="'JetBrains Mono', monospace" text-anchor="middle">students.db</text>
            </svg>
SVG;

        case 'inventory-system':
            return <<<SVG
            <svg class="project-diagram-svg" viewBox="0 0 460 150" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <!-- POS Interface -->
                <rect x="20" y="45" width="100" height="60" rx="6" fill="rgba(20,22,30,0.8)" stroke="#a1a1aa" stroke-width="1.2"/>
                <text x="70" y="72" fill="#f3f4f6" font-size="13" font-family="'Outfit', sans-serif" font-weight="600" text-anchor="middle">Stock Entry</text>
                <text x="70" y="90" fill="#a1a1aa" font-size="12" font-family="'JetBrains Mono', monospace" text-anchor="middle">SKU / Quantity</text>

                <!-- Arrow 1 -->
                <line x1="125" y1="75" x2="165" y2="75" stroke="#ffffff" stroke-width="1.5" stroke-dasharray="3 3"/>
                <polygon points="163,71 170,75 163,79" fill="#ffffff"/>

                <!-- Transaction Engine -->
                <rect x="175" y="45" width="125" height="60" rx="6" fill="rgba(255,255,255,0.06)" stroke="#ffffff" stroke-width="1.5"/>
                <text x="237" y="72" fill="#ffffff" font-size="13" font-family="'Outfit', sans-serif" font-weight="700" text-anchor="middle">ACID Manager</text>
                <text x="237" y="90" fill="#d1d5db" font-size="12" font-family="'JetBrains Mono', monospace" text-anchor="middle">Commit / Rollback</text>

                <!-- Arrow 2 -->
                <line x1="305" y1="75" x2="340" y2="75" stroke="#ffffff" stroke-width="1.5" stroke-dasharray="3 3"/>
                <polygon points="338,71 345,75 338,79" fill="#ffffff"/>

                <!-- Relational Schema -->
                <rect x="350" y="45" width="95" height="60" rx="6" fill="rgba(20,22,30,0.8)" stroke="#a1a1aa" stroke-width="1.2"/>
                <text x="397" y="72" fill="#f3f4f6" font-size="13" font-family="'Outfit', sans-serif" font-weight="600" text-anchor="middle">Audit Log</text>
                <text x="397" y="90" fill="#a1a1aa" font-size="12" font-family="'JetBrains Mono', monospace" text-anchor="middle">FK Constraints</text>
            </svg>
SVG;

        case 'network-sim':
            return <<<SVG
            <svg class="project-diagram-svg" viewBox="0 0 460 150" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <!-- Gateway Router -->
                <rect x="25" y="45" width="105" height="60" rx="6" fill="rgba(20,22,30,0.8)" stroke="#a1a1aa" stroke-width="1.2"/>
                <text x="77" y="72" fill="#f3f4f6" font-size="13" font-family="'Outfit', sans-serif" font-weight="600" text-anchor="middle">Edge Router</text>
                <text x="77" y="90" fill="#a1a1aa" font-size="12" font-family="'JetBrains Mono', monospace" text-anchor="middle">192.168.1.1</text>

                <!-- Arrow 1 -->
                <line x1="135" y1="75" x2="165" y2="75" stroke="#ffffff" stroke-width="1.5" stroke-dasharray="3 3"/>
                <polygon points="163,71 170,75 163,79" fill="#ffffff"/>

                <!-- Managed Switch Trunk -->
                <rect x="175" y="40" width="125" height="70" rx="6" fill="rgba(255,255,255,0.06)" stroke="#ffffff" stroke-width="1.5"/>
                <text x="237" y="68" fill="#ffffff" font-size="13" font-family="'Outfit', sans-serif" font-weight="700" text-anchor="middle">Managed Switch</text>
                <text x="237" y="86" fill="#d1d5db" font-size="12" font-family="'JetBrains Mono', monospace" text-anchor="middle">VLAN 10: Labs</text>
                <text x="237" y="100" fill="#a1a1aa" font-size="11" font-family="'JetBrains Mono', monospace" text-anchor="middle">VLAN 20: Faculty</text>

                <!-- Arrow 2 -->
                <line x1="305" y1="75" x2="335" y2="75" stroke="#ffffff" stroke-width="1.5" stroke-dasharray="3 3"/>
                <polygon points="333,71 340,75 333,79" fill="#ffffff"/>

                <!-- End Devices / Subnets -->
                <rect x="345" y="45" width="100" height="60" rx="6" fill="rgba(20,22,30,0.8)" stroke="#a1a1aa" stroke-width="1.2"/>
                <text x="395" y="72" fill="#f3f4f6" font-size="13" font-family="'Outfit', sans-serif" font-weight="600" text-anchor="middle">Endpoints</text>
                <text x="395" y="90" fill="#a1a1aa" font-size="12" font-family="'JetBrains Mono', monospace" text-anchor="middle">Subnet Ping OK</text>
            </svg>
SVG;

        case 'portfolio-site':
            return <<<SVG
            <svg class="project-diagram-svg" viewBox="0 0 460 150" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <!-- Browser Client -->
                <rect x="25" y="45" width="95" height="60" rx="6" fill="rgba(20,22,30,0.8)" stroke="#a1a1aa" stroke-width="1.2"/>
                <text x="72" y="72" fill="#f3f4f6" font-size="13" font-family="'Outfit', sans-serif" font-weight="600" text-anchor="middle">Browser</text>
                <text x="72" y="90" fill="#a1a1aa" font-size="12" font-family="'JetBrains Mono', monospace" text-anchor="middle">0 build tools</text>

                <!-- Arrow 1 -->
                <line x1="125" y1="75" x2="160" y2="75" stroke="#ffffff" stroke-width="1.5" stroke-dasharray="3 3"/>
                <polygon points="158,71 165,75 158,79" fill="#ffffff"/>

                <!-- SSR Engine -->
                <rect x="170" y="40" width="135" height="70" rx="6" fill="rgba(255,255,255,0.06)" stroke="#ffffff" stroke-width="1.5"/>
                <text x="237" y="68" fill="#ffffff" font-size="13" font-family="'Outfit', sans-serif" font-weight="700" text-anchor="middle">Vanilla PHP Core</text>
                <text x="237" y="86" fill="#d1d5db" font-size="12" font-family="'JetBrains Mono', monospace" text-anchor="middle">data.php &middot; Partials</text>
                <text x="237" y="100" fill="#a1a1aa" font-size="11" font-family="'JetBrains Mono', monospace" text-anchor="middle">WCAG 2.1 AA</text>

                <!-- Arrow 2 -->
                <line x1="310" y1="75" x2="345" y2="75" stroke="#ffffff" stroke-width="1.5" stroke-dasharray="3 3"/>
                <polygon points="343,71 350,75 343,79" fill="#ffffff"/>

                <!-- SPA View Controller -->
                <rect x="355" y="45" width="90" height="60" rx="6" fill="rgba(20,22,30,0.8)" stroke="#a1a1aa" stroke-width="1.2"/>
                <text x="400" y="72" fill="#f3f4f6" font-size="13" font-family="'Outfit', sans-serif" font-weight="600" text-anchor="middle">SPA State</text>
                <text x="400" y="90" fill="#a1a1aa" font-size="12" font-family="'JetBrains Mono', monospace" text-anchor="middle">No Page Reload</text>
            </svg>
SVG;

        default:
            return '';
    }
}
?>
<section class="content-section" id="projects">
    <div class="section-heading">
        <h2 class="section-title">Projects &amp; Lab Work</h2>
        <p class="section-subtitle">
            Tools built to solve actual student problems, coursework deep-dives, and early engineering explorations. Click tabs on any project to read what broke and what was learned.
        </p>
    </div>

    <div class="projects-list">
        <?php foreach ($data['projects'] as $project): 
            $pid = $project['id'];
            $variantClass = 'student-project-card';
            if ($pid === 'campus-portal') {
                $variantClass .= ' project-featured-card';
            } elseif ($pid === 'inventory-system') {
                $variantClass .= ' project-split-card';
            } elseif ($pid === 'network-sim') {
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

                    <?php if ($pid === 'campus-portal'): ?>
                        <div class="project-ledger-badge" aria-label="Security &amp; Performance">
                            <span>PHP 8.2 PDO &middot; Prepared Statements &middot; Role-based Access</span>
                        </div>
                    <?php elseif ($pid === 'inventory-system'): ?>
                        <div class="project-ledger-badge" aria-label="Database Integrity">
                            <span>MySQL &middot; ACID Transactions &middot; Foreign Key Integrity</span>
                        </div>
                    <?php elseif ($pid === 'network-sim'): ?>
                        <div class="project-cli-header" aria-label="Cisco Packet Tracer CLI Session">
                            <span class="cli-prompt">Router(config)#</span>
                            <span class="cli-cmd">interface vlan 10 &amp;&amp; ip address 192.168.10.1 255.255.255.0</span>
                            <span class="cli-result">[Status: Up/Up] Subnet gateway active</span>
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
        <a href="#coursework" class="btn btn-secondary btn-sm spa-stepper-btn" data-section="coursework">
            <?= render_icon('chevron-left') ?>
            <span class="stepper-num">02</span>
            <span>Coursework</span>
        </a>
        <a href="#notes" class="btn btn-secondary btn-sm spa-stepper-btn" data-section="notes">
            <span>Read Lab Notes</span>
            <span class="stepper-num">04</span>
            <?= render_icon('chevron-right') ?>
        </a>
    </div>
</section>
