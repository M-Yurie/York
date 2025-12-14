<?php
$pageTitle = 'York | Connect';
$pageStyles = ['styles/general.css', 'styles/conect-page.css', 'styles/fonts.css'];
$pageScripts = ['js/conect-page.js', 'js/general.js'];
require 'includes/header.php';
?>
<?php require 'includes/nav.php'; ?>

<main>
    <section class="login-box">
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
        <input class="email container" type="text" placeholder="EMAIL OR PHONE NUMBER">
        <input class="password container" type="password" placeholder="PASSWORD">
        <span id="password-alt">Forgot your password?</span>
        <button class="sign-in">SIGN IN</button>
    </section>
    <section class="create-account-box hidden">
        <div class="title">
            <h1>Create account</h1>
            <img class="switcher to-log-in" src="icons/switcher.svg">
        </div>
        <input class="name container" type="text" placeholder="YOUR NAME">
        <input class="email container" type="text" placeholder="EMAIL OR PHONE NUMBER">
        <input class="password container" type="password" placeholder="PASSWORD">
        <input class="re-password container" type="password" placeholder="RE-ENTER PASSWORD">
        <button class="next">NEXT STEP</button>
    </section>
    </main>
    
    

<?php require 'includes/footer.php'; ?>
