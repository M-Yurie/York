<?php
require __DIR__ . '/../_bootstrap.php';

try {
    $stmt = $pdo->prepare('
        SELECT p.id, p.name, p.price, p.main_image
        FROM favorites f
        JOIN products p ON f.product_id = p.id
        WHERE f.user_id = ?
        ORDER BY f.created_at DESC
    ');
    $stmt->execute([$currentUser['id']]);
    $favorites = $stmt->fetchAll();
    echo json_encode(['ok' => true, 'data' => $favorites]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'message' => 'Server error']);
}
