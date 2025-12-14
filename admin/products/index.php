<?php
require __DIR__ . '/../../includes/bootstrap.php';
require_once __DIR__ . '/../../includes/auth.php';
$currentUser = require_admin();

$pageTitle = 'Admin | Products';
$pageStyles = ['styles/general.css'];
$pageScripts = ['js/general.js'];

$pdo = db();
$q = trim($_GET['q'] ?? '');
$flash = get_flash('admin_products_message');

try {
    if ($q !== '') {
        $stmt = $pdo->prepare('SELECT id, name, price FROM products WHERE name LIKE ? ORDER BY created_at DESC');
        $stmt->execute(['%' . $q . '%']);
    } else {
        $stmt = $pdo->query('SELECT id, name, price FROM products ORDER BY created_at DESC');
    }
    $products = $stmt->fetchAll();
} catch (Exception $e) {
    $products = [];
}

require __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/nav.php';
?>

<main style="padding: 2rem;">
    <h1>Products</h1>
    <?php if ($flash): ?>
        <div style="margin: 1rem 0; color: green;"><?php echo htmlspecialchars($flash); ?></div>
    <?php endif; ?>
    <div style="display:flex;gap:1rem;align-items:center;margin-bottom:1rem;">
        <form method="get" action="/admin/products/index.php" style="display:flex;gap:0.5rem;align-items:center;">
            <input type="text" name="q" placeholder="Search by name" value="<?php echo htmlspecialchars($q); ?>" style="padding:0.4rem;">
            <button type="submit" style="padding:0.4rem 0.8rem;">Search</button>
        </form>
        <a href="/admin/products/create.php" style="padding:0.5rem 1rem; border:1px solid #ccc;">Create Product</a>
    </div>
    <table style="width:100%; border-collapse:collapse;">
        <thead>
            <tr style="text-align:left; border-bottom:1px solid #ddd;">
                <th style="padding:0.5rem;">ID</th>
                <th style="padding:0.5rem;">Name</th>
                <th style="padding:0.5rem;">Price</th>
                <th style="padding:0.5rem;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($products)): ?>
                <tr><td colspan="4" style="padding:0.5rem;">No products found.</td></tr>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <tr style="border-bottom:1px solid #f0f0f0;">
                        <td style="padding:0.5rem;"><?php echo htmlspecialchars($product['id']); ?></td>
                        <td style="padding:0.5rem;"><?php echo htmlspecialchars($product['name']); ?></td>
                        <td style="padding:0.5rem;"><?php echo htmlspecialchars($product['price']); ?></td>
                        <td style="padding:0.5rem; display:flex; gap:0.5rem;">
                            <a href="/admin/products/edit.php?id=<?php echo urlencode($product['id']); ?>" style="padding:0.3rem 0.6rem; border:1px solid #ccc;">Edit</a>
                            <form method="post" action="/admin/products/delete.php" onsubmit="return confirm('Delete this product?');">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
                                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token()); ?>">
                                <button type="submit" style="padding:0.3rem 0.6rem; border:1px solid #f00; color:#f00; background:#fff;">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</main>

<?php require __DIR__ . '/../../includes/footer.php'; ?>
