<?php
require __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/auth.php';
$currentUser = require_admin();

$pageTitle = 'Admin Dashboard';
$pageStyles = ['styles/general.css'];
$pageScripts = ['js/general.js'];
require __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/nav.php';

$pdo = db();
$totalUsers = 0;
$totalProducts = 0;

try {
    $stmt = $pdo->query('SELECT COUNT(*) FROM users');
    $totalUsers = (int) $stmt->fetchColumn();
} catch (Exception $e) {
    $totalUsers = 0;
}

try {
    $stmt = $pdo->query('SELECT COUNT(*) FROM products');
    $totalProducts = (int) $stmt->fetchColumn();
} catch (Exception $e) {
    $totalProducts = 0;
}
?>

<main style="padding: 2rem;">
    <h1>Admin Dashboard</h1>
    <div style="display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 2rem;">
        <div style="border: 1px solid #ddd; padding: 1rem; min-width: 180px;">
            <h3>Total Users</h3>
            <p><?php echo htmlspecialchars($totalUsers); ?></p>
        </div>
        <div style="border: 1px solid #ddd; padding: 1rem; min-width: 180px;">
            <h3>Total Products</h3>
            <p><?php echo htmlspecialchars($totalProducts); ?></p>
        </div>
    </div>
    <section>
        <h2>Quick Links</h2>
        <ul>
            <li><a href="#">Manage Products</a></li>
            <li><a href="#">Manage Categories</a></li>
            <li><a href="#">Manage Orders</a></li>
        </ul>
    </section>
</main>

<?php require __DIR__ . '/../includes/footer.php'; ?>
