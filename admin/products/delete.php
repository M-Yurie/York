<?php
require __DIR__ . '/../../includes/bootstrap.php';
require_once __DIR__ . '/../../includes/auth.php';
require_admin();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /admin/products/index.php');
    exit;
}

$id = $_POST['id'] ?? null;
$token = $_POST['csrf_token'] ?? '';

if (!$id || !csrf_validate($token)) {
    set_flash('admin_products_message', 'Invalid request');
    header('Location: /admin/products/index.php');
    exit;
}

$pdo = db();
$stmt = $pdo->prepare('DELETE FROM products WHERE id = ?');
$stmt->execute([$id]);

set_flash('admin_products_message', 'Product deleted');
header('Location: /admin/products/index.php');
exit;
