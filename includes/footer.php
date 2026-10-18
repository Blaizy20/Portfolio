<?php
/**
 * Site Footer Template
 * Closes the main content area, site-shell, renders colophon, and loads interactive scripts.
 */
?>
    <footer class="main-colophon">
        <div class="colophon-inner">
            <div class="colophon-brand">
                <span class="colophon-avatar">JSE</span>
                <div>
                    <div class="colophon-name"><?= htmlspecialchars($data['site']['author']) ?></div>
                    <div class="colophon-title">3rd Year BSIT Student &middot; NU Baliwag</div>
                </div>
            </div>

            <div class="colophon-meta">
                <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($data['site']['author']) ?>. Handcrafted with vanilla PHP, CSS, and JS.</p>
                <p class="colophon-note">No bloated frameworks, zero unnecessary dependencies, 100% accessible.</p>
            </div>
        </div>
    </footer>
</main>
</div><!-- /.site-shell -->

<?php
require_once __DIR__ . '/resume_modal.php';
require_once __DIR__ . '/mobile_nav.php';
?>

<script src="assets/js/main.js"></script>
</body>
</html>
