<?php
/**
 * Coursework & Technical Foundations Section Template
 * Replaces generic % skill bars with authentic academic coursework and tooling.
 */

$categories = ['All'];
foreach ($data['courses'] as $course) {
    if (!empty($course['category']) && !in_array($course['category'], $categories)) {
        $categories[] = $course['category'];
    }
}
?>
<section class="content-section" id="coursework">
    <div class="section-heading">
        <h2 class="section-title">Coursework &amp; Technical Foundations</h2>
        <p class="section-subtitle">
            The computer science curricula, laboratory projects, and systems concepts shaping how I build and reason about software.
        </p>
    </div>

    <!-- Category Filters -->
    <div class="filter-bar" role="tablist" aria-label="Coursework categories">
        <?php foreach ($categories as $index => $cat): ?>
            <button type="button" 
                    class="filter-pill <?= $index === 0 ? 'active' : '' ?>" 
                    data-filter="<?= htmlspecialchars(strtolower($cat)) ?>"
                    role="tab"
                    aria-selected="<?= $index === 0 ? 'true' : 'false' ?>">
                <?= htmlspecialchars($cat) ?>
            </button>
        <?php endforeach; ?>
    </div>

    <!-- Asymmetric Coursework Bento Grid -->
    <div class="courses-grid" id="coursesGrid">
        <?php foreach ($data['courses'] as $course): 
            $code = $course['code'];
            $cardClass = 'course-card';
            if ($code === 'IT 301') {
                $cardClass .= ' course-card-hero';
            } elseif ($code === 'IT 302' || $code === 'IT 303') {
                $cardClass .= ' course-card-medium';
            } else {
                $cardClass .= ' course-card-compact';
            }
        ?>
            <article class="<?= $cardClass ?>" data-category="<?= htmlspecialchars(strtolower($course['category'])) ?>">
                <div class="course-card-top">
                    <div class="course-code-badge"><?= htmlspecialchars($course['code']) ?></div>
                    <span class="course-term"><?= htmlspecialchars($course['term']) ?></span>
                </div>

                <h3 class="course-title"><?= htmlspecialchars($course['title']) ?></h3>

                <?php if ($code === 'IT 301'): ?>
                    <!-- Full-Stack Web Pipeline Visual Strip -->
                    <div class="course-visual-artifact web-stack-strip" aria-label="IT 301 Web Stack Pipeline">
                        <span class="mono-code">HTTP/2 &rsaquo; PHP 8 Router &rsaquo; PDO MySQL &rsaquo; HTML5/CSS</span>
                        <span class="mono-desc">Full-Stack Web Architecture &middot; Prepared Stmts &middot; Session Auth</span>
                    </div>
                <?php elseif ($code === 'IT 302'): ?>
                    <!-- Database Relational Strip -->
                    <div class="course-visual-artifact tree-invariant-strip" aria-label="IT 302 Database Modeling">
                        <span class="mono-code">3NF Schema: [PK] id &middot; [FK] student_id &middot; INDEX(status)</span>
                        <span class="mono-desc">ACID Transactions &middot; Referential Integrity &middot; SQL Tuning</span>
                    </div>
                <?php elseif ($code === 'IT 303'): ?>
                    <!-- Network Topology Visual Strip -->
                    <div class="course-visual-artifact memory-hierarchy-strip" aria-label="IT 303 Subnetting and Networking">
                        <div class="hierarchy-level">
                            <span class="hl-name">192.168.10.0/24</span>
                            <span class="hl-lat">VLAN 10</span>
                        </div>
                        <span class="hl-arrow">&rsaquo;</span>
                        <div class="hierarchy-level hl-highlight">
                            <span class="hl-name">Trunk 802.1Q</span>
                            <span class="hl-lat">Managed SW</span>
                        </div>
                        <span class="hl-arrow">&rsaquo;</span>
                        <div class="hierarchy-level">
                            <span class="hl-name">Gateway</span>
                            <span class="hl-lat">NAT/DHCP</span>
                        </div>
                    </div>
                <?php elseif ($code === 'IT 304'): ?>
                    <div class="course-visual-artifact circuit-matrix-strip" aria-label="IT 304 Systems Analysis">
                        <span class="mono-code">Requirements &rsaquo; DFD L1 &rsaquo; ERD Model &rsaquo; Agile Sprint</span>
                        <span class="mono-desc">SDLC Modeling &middot; Feasibility Studies &middot; Use Case Specs</span>
                    </div>
                <?php elseif ($code === 'IT 201'): ?>
                    <div class="course-visual-artifact scheme-eval-strip" aria-label="IT 201 OOP Architecture">
                        <span class="mono-code">class Student extends User implements Authenticable</span>
                        <span class="mono-desc">Encapsulation &middot; Inheritance &middot; Clean Interfaces</span>
                    </div>
                <?php elseif ($code === 'IT 202'): ?>
                    <div class="course-visual-artifact math-proof-strip" aria-label="IT 202 Information Assurance & Security">
                        <span class="mono-code">password_hash(PASSWORD_BCRYPT) &middot; CSRF Tokens</span>
                        <span class="mono-desc">OWASP Top 10 Mitigation &middot; Access Control &middot; Sanitization</span>
                    </div>
                <?php endif; ?>

                <p class="course-summary"><?= htmlspecialchars($course['summary']) ?></p>

                <div class="course-takeaway">
                    <span class="takeaway-label">Key Takeaway:</span>
                    <p class="takeaway-text">"<?= htmlspecialchars($course['lesson']) ?>"</p>
                </div>

                <div class="course-tags">
                    <?php foreach ($course['languages'] as $lang): ?>
                        <span class="course-tag">
                            <?= render_tech_icon($lang, 'course-tag-icon') ?>
                            <span><?= htmlspecialchars($lang) ?></span>
                        </span>
                    <?php endforeach; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <!-- Active Toolkit & Working Knowledge -->
    <div class="toolkit-panel">
        <div class="toolkit-header">
            <h3 class="toolkit-title">Tools &amp; Working Knowledge</h3>
            <span class="toolkit-caption">Technologies practiced in lecture, lab, and side builds</span>
        </div>

        <div class="toolkit-columns">
            <?php foreach ($data['toolkit'] as $groupName => $tools): ?>
                <div class="toolkit-col">
                    <div class="toolkit-group-name"><?= htmlspecialchars($groupName) ?></div>
                    <ul class="toolkit-list">
                        <?php foreach ($tools as $tool): ?>
                            <li class="toolkit-item">
                                <span class="toolkit-icon-badge" aria-hidden="true">
                                    <?= render_tech_icon($tool, 'toolkit-item-icon') ?>
                                </span>
                                <span class="toolkit-name"><?= htmlspecialchars($tool) ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- SPA View Stepper Navigation -->
    <div class="spa-view-stepper">
        <a href="#intro" class="btn btn-secondary btn-sm spa-stepper-btn" data-section="intro">
            <?= render_icon('chevron-left') ?>
            <span class="stepper-num">01</span>
            <span>Introduction</span>
        </a>
        <a href="#projects" class="btn btn-secondary btn-sm spa-stepper-btn" data-section="projects">
            <span>Explore Projects</span>
            <span class="stepper-num">03</span>
            <?= render_icon('chevron-right') ?>
        </a>
    </div>
</section>
