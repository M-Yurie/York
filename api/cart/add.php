<?php
require __DIR__ . '/../_bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'message' => 'Method not allowed']);
    exit;
}

if (!csrf_validate($_POST['csrf_token'] ?? '')) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'message' => 'Invalid CSRF token']);
    exit;
}

$productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
$qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;
if ($productId <= 0 || $qty <= 0) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'message' => 'Invalid input']);
    exit;
}

try {
    $stmt = $pdo->prepare('SELECT id, price FROM products WHERE id = ? LIMIT 1');
    $stmt->execute([$productId]);
    $product = $stmt->fetch();
    if (!$product) {
        http_response_code(404);
        echo json_encode(['ok' => false, 'message' => 'Product not found']);
        exit;
    }

    $cartId = get_active_cart_id($pdo, (int)$currentUser['id']);

    $stmt = $pdo->prepare('SELECT id, quantity FROM cart_items WHERE cart_id = ? AND product_id = ?');
    $stmt->execute([$cartId, $productId]);
    $existing = $stmt->fetch();
    if ($existing) {
        $newQty = (int)$existing['quantity'] + $qty;
        $stmt = $pdo->prepare('UPDATE cart_items SET quantity = ?, updated_at = NOW() WHERE id = ?');
        $stmt->execute([$newQty, $existing['id']]);
    } else {
        $stmt = $pdo->prepare('INSERT INTO cart_items (cart_id, product_id, quantity, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())');
        $stmt->execute([$cartId, $productId, $qty]);
    }

    $totals = cart_total($pdo, $cartId);
    echo json_encode(['ok' => true, 'message' => 'Added to cart', 'data' => ['cart_id' => $cartId, 'total' => $totals['total']]]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'message' => 'Server error']);
}
