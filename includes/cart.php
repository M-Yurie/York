<?php
require_once __DIR__ . '/bootstrap.php';

function get_active_cart_id(PDO $pdo, int $userId): int
{
    $stmt = $pdo->prepare("SELECT id FROM carts WHERE user_id = ? AND status = 'active' LIMIT 1");
    $stmt->execute([$userId]);
    $cartId = $stmt->fetchColumn();
    if ($cartId) {
        return (int)$cartId;
    }
    $stmt = $pdo->prepare("INSERT INTO carts (user_id, status, created_at, updated_at) VALUES (?, 'active', NOW(), NOW())");
    $stmt->execute([$userId]);
    return (int)$pdo->lastInsertId();
}

function cart_total(PDO $pdo, int $cartId): array
{
    $stmt = $pdo->prepare("
        SELECT ci.product_id, ci.quantity, p.price
        FROM cart_items ci
        JOIN products p ON ci.product_id = p.id
        WHERE ci.cart_id = ?
    ");
    $stmt->execute([$cartId]);
    $items = $stmt->fetchAll();
    $total = 0.0;
    foreach ($items as $item) {
        $total += (float)$item['price'] * (int)$item['quantity'];
    }
    return ['total' => $total, 'items' => $items];
}
