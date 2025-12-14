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
if ($productId <= 0) {
    http_response_code(400);
    echo json_encode(['ok' => false, 'message' => 'Invalid input']);
    exit;
}

try {
    $cartId = get_active_cart_id($pdo, (int)$currentUser['id']);
    $stmt = $pdo->prepare('DELETE FROM cart_items WHERE cart_id = ? AND product_id = ?');
    $stmt->execute([$cartId, $productId]);

    $totals = cart_total($pdo, $cartId);
    echo json_encode(['ok' => true, 'message' => 'Item removed', 'data' => ['cart_id' => $cartId, 'total' => $totals['total']]]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'message' => 'Server error']);
}
