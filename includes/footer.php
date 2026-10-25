<?php
/**
 * Site Footer Template
 * Closes the main content area, site-shell, renders colophon, and loads interactive scripts.
 */
?>
    <footer class="main-colophon">
        <div class="colophon-inner">

            <div class="colophon-meta">
                <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($data['site']['author']) ?>. All rights reserved.</p>
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
