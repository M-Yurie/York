<?php
require __DIR__ . '/../_bootstrap.php';

try {
    $cartId = get_active_cart_id($pdo, (int)$currentUser['id']);
    $stmt = $pdo->prepare('
        SELECT ci.product_id, ci.quantity, p.name, p.price, p.main_image
        FROM cart_items ci
        JOIN products p ON ci.product_id = p.id
        WHERE ci.cart_id = ?
    ');
    $stmt->execute([$cartId]);
    $items = $stmt->fetchAll();

    $total = 0.0;
    foreach ($items as $item) {
        $total += (float)$item['price'] * (int)$item['quantity'];
    }

    echo json_encode(['ok' => true, 'data' => ['cart_id' => $cartId, 'items' => $items, 'total' => $total]]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'message' => 'Server error']);
}
