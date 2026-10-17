<?php
/**
 * Simple & Elegant Welcome Loading Screen
 * Minimalist, calm presentation with monogram badge, author info, and progress bar.
 */
?>
<div class="welcome-screen" id="welcomeScreen" role="dialog" aria-modal="true" aria-label="Welcome to John Senen Estrella Portfolio">
    <div class="welcome-card" id="welcomeCard">
        <div class="welcome-badge" aria-hidden="true">
            <span class="welcome-badge-letter">J</span>
        </div>

        <div class="welcome-info">
            <h1 class="welcome-title"><?= htmlspecialchars($data['site']['author']) ?></h1>
            <p class="welcome-subtitle"><?= htmlspecialchars($data['site']['subrole'] ?? '3rd Year BSIT Student · NU Baliwag') ?></p>
        </div>

        <div class="welcome-status-wrap">
            <div class="welcome-status-row">
                <span class="welcome-status-text" id="welcomeStatusText">Loading portfolio...</span>
                <span class="welcome-percent-readout" id="welcomePercent">0%</span>
            </div>
            <div class="welcome-progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <div class="welcome-progress-fill" id="welcomeProgressFill"></div>
            </div>
        </div>

        <button type="button" class="welcome-skip-btn" id="welcomeSkipBtn" aria-label="Skip loading and view portfolio">
            <span>Skip intro</span>
            <kbd class="welcome-skip-kbd" aria-hidden="true">ESC</kbd>
        </button>
    </div>
</div>
