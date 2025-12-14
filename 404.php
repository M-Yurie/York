<?php
require 'includes/bootstrap.php';
$pageTitle = 'York | 404';
$pageStyles = ['styles/general.css', 'styles/404.css', 'styles/fonts.css'];
$pageScripts = ['js/general.js'];
require 'includes/header.php';
?>
<?php require 'includes/nav.php'; ?>

<main class="not-found-main">
        <div class="not-found-container">
            <div class="not-found-graphic">
                <span class="not-found-404">404</span>
            </div>
            <h1 class="not-found-title">Page Not Found</h1>
            <p class="not-found-message">
                Oops! The page you are looking for doesn’t exist or has been moved.<br>
                Go back to the <a href="index.php" class="not-found-link">homepage</a> or try searching for something else.
            </p>
            <a href="index.php" class="not-found-home-btn">Back to Home</a>
        </div>
    </main>

    

<?php require 'includes/footer.php'; ?>
