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
    echo json_encode(['ok' => false, 'message' => 'Invalid product']);
    exit;
}

try {
    $stmt = $pdo->prepare('SELECT id FROM products WHERE id = ? LIMIT 1');
    $stmt->execute([$productId]);
    if (!$stmt->fetchColumn()) {
        http_response_code(404);
        echo json_encode(['ok' => false, 'message' => 'Product not found']);
        exit;
    }

    $stmt = $pdo->prepare('SELECT id FROM favorites WHERE user_id = ? AND product_id = ? LIMIT 1');
    $stmt->execute([$currentUser['id'], $productId]);
    $favId = $stmt->fetchColumn();

    if ($favId) {
        $stmt = $pdo->prepare('DELETE FROM favorites WHERE id = ?');
        $stmt->execute([$favId]);
        echo json_encode(['ok' => true, 'message' => 'Removed from favorites', 'data' => ['favorited' => false]]);
    } else {
        $stmt = $pdo->prepare('INSERT INTO favorites (user_id, product_id, created_at) VALUES (?, ?, NOW())');
        $stmt->execute([$currentUser['id'], $productId]);
        echo json_encode(['ok' => true, 'message' => 'Added to favorites', 'data' => ['favorited' => true]]);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['ok' => false, 'message' => 'Server error']);
}
