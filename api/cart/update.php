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
$qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 0;
if ($productId <= 0 || $qty <= 0) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'message' => 'Invalid input']);
    exit;
}

try {
    $cartId = get_active_cart_id($pdo, (int)$currentUser['id']);
    $stmt = $pdo->prepare('SELECT id FROM cart_items WHERE cart_id = ? AND product_id = ?');
    $stmt->execute([$cartId, $productId]);
    $existing = $stmt->fetch();
    if (!$existing) {
        http_response_code(404);
        echo json_encode(['ok' => false, 'message' => 'Item not in cart']);
        exit;
    }

    $stmt = $pdo->prepare('UPDATE cart_items SET quantity = ?, updated_at = NOW() WHERE id = ?');
    $stmt->execute([$qty, $existing['id']]);

    $totals = cart_total($pdo, $cartId);
    echo json_encode(['ok' => true, 'message' => 'Cart updated', 'data' => ['cart_id' => $cartId, 'total' => $totals['total']]]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'message' => 'Server error']);
}
