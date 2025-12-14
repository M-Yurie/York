<?php
require __DIR__ . '/../includes/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /conect-page.php');
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$password2 = $_POST['password2'] ?? '';
$name = trim($_POST['name'] ?? '');

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    set_flash('register_error', 'Invalid email');
    header('Location: /conect-page.php');
    exit;
}

if (strlen($password) < 6) {
    set_flash('register_error', 'Password must be at least 6 characters');
    header('Location: /conect-page.php');
    exit;
}

if ($password !== $password2) {
    set_flash('register_error', 'Passwords do not match');
    header('Location: /conect-page.php');
    exit;
}

$stmt = db()->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
$stmt->execute([$email]);
if ($stmt->fetch()) {
    set_flash('register_error', 'Email already registered');
    header('Location: /conect-page.php');
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = db()->prepare('INSERT INTO users (email, password_hash, name, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())');
$stmt->execute([$email, $hash, $name ?: null]);
$_SESSION['user_id'] = db()->lastInsertId();
header('Location: /account-page.php');
exit;
