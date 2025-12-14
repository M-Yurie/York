<?php
require __DIR__ . '/../includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /conect-page.php');
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password === '') {
    set_flash('login_error', 'Invalid email or password');
    header('Location: /conect-page.php');
    exit;
}

$stmt = db()->prepare('SELECT id, password_hash FROM users WHERE email = ? LIMIT 1');
$stmt->execute([$email]);
$user = $stmt->fetch();

if ($user && password_verify($password, $user['password_hash'])) {
    $_SESSION['user_id'] = $user['id'];
    header('Location: /account-page.php');
    exit;
}

set_flash('login_error', 'Invalid email or password');
header('Location: /conect-page.php');
exit;
