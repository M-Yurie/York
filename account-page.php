<?php
require 'includes/bootstrap.php';
require_once 'includes/auth.php';
$pageTitle = 'York | Account';
$pageStyles = ['styles/general.css', 'styles/account-page.css', 'styles/fonts.css'];
$pageScripts = ['js/account-page.js', 'js/general.js'];
require 'includes/header.php';
$currentUser = require_auth();
?>
<?php require 'includes/nav.php'; ?>

<main>
        <div class="account-container">
            <aside class="account-sidebar">
                <div class="sidebar-title">ACCOUNT OVERVIEW</div>
                <ul>
                    <li class="active"><a href="#">Personal Info</a> <span>&gt;</span></li>
                    <li><a href="#">Address Book</a> <span>&gt;</span></li>
                    <li><a href="#">Preferences</a> <span>&gt;</span></li>
                    <li><a href="#">Size Profile</a> <span>&gt;</span></li>
                    <li><a href="#" class="logout-link">Log Out</a></li>
                </ul>
            </aside>
            <section class="account-content">
                <div class="account-details">
                    <h2>MY DETAILS</h2>
                    <div class="details-box">
                        <div class="profile-pic">
                            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=facearea&w=256&h=256&facepad=2" alt="Profile Picture">
                        </div>
                        <div class="profile-info">
                            <div><b>NAME:</b> <?php echo htmlspecialchars($currentUser['name'] ?? ''); ?></div>
                            <div><b>BIRTHDATE:</b> 15 jan 2007</div>
                            <div><b>PREFERRED GENDER:</b> Any</div>
                            <button class="edit-btn">EDIT</button>
                        </div>
                    </div>
                    <h2>LOGIN DETAILS</h2>
                    <div class="details-box">
                        <div class="login-info">
                            <div class="login-row">
                                <span class="login-label">EMAIL</span>
                                <span class="login-value"><?php echo htmlspecialchars($currentUser['email'] ?? ''); ?></span>
                                <button class="edit-btn">EDIT</button>
                            </div>
                            <div class="login-row">
                                <span class="login-label">PASSWORD</span>
                                <span class="login-value">************</span>
                                <button class="edit-btn">EDIT</button>
                            </div>
                            <div class="login-row">
                                <span class="login-label">YOUR ID</span>
                                <span class="login-value">tralaleto-tralalei-123</span>
                            </div>
                            <div class="logout-row">
                                <button class="logout-btn">LOG ME OUT <span>&rarr;</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    

<?php require 'includes/footer.php'; ?>
