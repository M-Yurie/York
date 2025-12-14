<?php
require 'includes/bootstrap.php';
require_once 'includes/auth.php';
require_guest();
$loginError = get_flash('login_error') ?: ($_GET['flash'] ?? '');
$registerError = get_flash('register_error');

require 'includes/header.php';
?>
<?php require 'includes/nav.php'; ?>

<main>
    <section class="login-box">
        <?php if ($loginError): ?>
            <div class="error-message" style="color:red;"><?php echo htmlspecialchars($loginError); ?></div>
        <?php endif; ?>
        <form method="post" action="auth/login.php">
        <div class="title">
            <h1>Log in</h1>
            <img class="switcher to-create" src="icons/switcher.svg">
        </div>
        <div class="log-in-alt">
            <img src="icons/devicon_apple.svg" alt="">
            <img src="icons/devicon_google.svg" alt="">
            <img src="icons/logos_facebook.svg" alt="">
        </div>
        <span id="or-span">OR</span>
        <input class="email container" type="text" name="email" placeholder="EMAIL OR PHONE NUMBER">
        <input class="password container" type="password" name="password" placeholder="PASSWORD">
        <span id="password-alt">Forgot your password?</span>
        <button class="sign-in" type="submit">SIGN IN</button>
        </form>
    </section>
    <section class="create-account-box hidden">
        <?php if ($registerError): ?>
            <div class="error-message" style="color:red;"><?php echo htmlspecialchars($registerError); ?></div>
        <?php endif; ?>
        <form method="post" action="auth/register.php">
        <div class="title">
            <h1>Create account</h1>
            <img class="switcher to-log-in" src="icons/switcher.svg">
        </div>
        <input class="name container" type="text" name="name" placeholder="YOUR NAME">
        <input class="email container" type="text" name="email" placeholder="EMAIL OR PHONE NUMBER">
        <input class="password container" type="password" name="password" placeholder="PASSWORD">
        <input class="re-password container" type="password" name="password2" placeholder="RE-ENTER PASSWORD">
        <button class="next" type="submit">NEXT STEP</button>
        </form>
    </section>
</main>

<?php require 'includes/footer.php'; ?>

    <script src="js/conect-page.js"></script>
    <script src="js/general.js"></script>
</body>
</html>
