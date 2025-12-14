<?php
require_once __DIR__ . '/bootstrap.php';

function set_flash(string $key, string $message): void
{
    if (!isset($_SESSION['__flash'])) {
        $_SESSION['__flash'] = [];
    }
    $_SESSION['__flash'][$key] = $message;
}

function get_flash(string $key): ?string
{
    if (!empty($_SESSION['__flash'][$key])) {
        $msg = $_SESSION['__flash'][$key];
        unset($_SESSION['__flash'][$key]);
        if (empty($_SESSION['__flash'])) {
            unset($_SESSION['__flash']);
        }
        return $msg;
    }
    return null;
}

function current_user(?PDO $pdo = null): ?array
{
    static $cachedUser = false;
    if ($cachedUser !== false) {
        return $cachedUser;
    }

    if (empty($_SESSION['user_id'])) {
        $cachedUser = null;
        return $cachedUser;
    }

    $pdo = $pdo ?: db();
    $stmt = $pdo->prepare('SELECT id, email, name, role FROM users WHERE id = ? LIMIT 1');
    $stmt->execute([$_SESSION['user_id']]);
    $user = $stmt->fetch();
    $cachedUser = $user ?: null;
    return $cachedUser;
}

function is_logged_in(): bool
{
    return current_user() !== null;
}

function require_auth(): array
{
    $user = current_user();
    if (!$user) {
        header('Location: /conect-page.php');
        exit;
    }
    return $user;
}

function require_guest(): void
{
    if (is_logged_in()) {
        header('Location: /account-page.php');
        exit;
    }
}

function require_admin(): array
{
    $user = require_auth();
    $isAdmin = isset($user['role']) ? ($user['role'] === 'admin') : ((int)($user['id'] ?? 0) === 1);
    if (!$isAdmin) {
        set_flash('auth_error', 'Access denied');
        header('Location: /account-page.php');
        exit;
    }
    return $user;
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_validate(?string $token): bool
{
    return !empty($token) && !empty($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
