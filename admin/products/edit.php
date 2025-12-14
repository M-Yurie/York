<?php
require __DIR__ . '/../../includes/bootstrap.php';
require_once __DIR__ . '/../../includes/auth.php';
$currentUser = require_admin();

$pdo = db();
$id = $_GET['id'] ?? null;
if (!$id) {
    set_flash('admin_products_message', 'Product not found');
    header('Location: /admin/products/index.php');
    exit;
}

try {
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ? LIMIT 1');
    $stmt->execute([$id]);
    $product = $stmt->fetch();
} catch (Exception $e) {
    $product = false;
}

if (!$product) {
    set_flash('admin_products_message', 'Product not found');
    header('Location: /admin/products/index.php');
    exit;
}

$pageTitle = 'Admin | Edit Product';
$pageStyles = ['styles/general.css'];
$pageScripts = ['js/general.js'];

$errors = [];
$name = $product['name'];
$price = $product['price'];
$description = $product['description'];
$image_path = $product['main_image'] ?? '';
$category_id = $product['category_id'];
$categories = [];

try {
    $stmt = $pdo->query('SELECT id, name FROM categories ORDER BY name ASC');
    $categories = $stmt->fetchAll();
} catch (Exception $e) {
    $categories = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_validate($_POST['csrf_token'] ?? '')) {
        $errors[] = 'Invalid CSRF token';
    }

    $name = trim($_POST['name'] ?? '');
    $price = trim($_POST['price'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $image_path = trim($_POST['image_path'] ?? '');
    $category_id = trim($_POST['category_id'] ?? '');

    if ($name === '') {
        $errors[] = 'Name is required';
    }
    if ($price === '' || !is_numeric($price)) {
        $errors[] = 'Price is required and must be numeric';
    }

    if (empty($errors)) {
        $cat = $category_id !== '' ? $category_id : null;
        $stmt = $pdo->prepare('UPDATE products SET name = ?, price = ?, description = ?, main_image = ?, category_id = ?, updated_at = NOW() WHERE id = ?');
        $stmt->execute([
            $name,
            (float)$price,
            $description !== '' ? $description : null,
            $image_path !== '' ? $image_path : null,
            $cat,
            $product['id']
        ]);
        set_flash('admin_products_message', 'Product updated');
        header('Location: /admin/products/index.php');
        exit;
    }
}

require __DIR__ . '/../../includes/header.php';
require __DIR__ . '/../../includes/nav.php';
?>

<main style="padding: 2rem;">
    <h1>Edit Product</h1>
    <?php if ($errors): ?>
        <div style="color:red; margin:1rem 0;">
            <?php foreach ($errors as $err): ?>
                <div><?php echo htmlspecialchars($err); ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <form method="post" action="/admin/products/edit.php?id=<?php echo urlencode($product['id']); ?>" style="display:grid;gap:0.75rem;max-width:480px;">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(csrf_token()); ?>">
        <label>
            Name
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" style="width:100%;padding:0.4rem;">
        </label>
        <label>
            Price
            <input type="text" name="price" value="<?php echo htmlspecialchars($price); ?>" style="width:100%;padding:0.4rem;">
        </label>
        <label>
            Description
            <textarea name="description" style="width:100%;padding:0.4rem;"><?php echo htmlspecialchars($description); ?></textarea>
        </label>
        <label>
            Image Path
            <input type="text" name="image_path" value="<?php echo htmlspecialchars($image_path); ?>" style="width:100%;padding:0.4rem;">
        </label>
        <label>
            Category
            <select name="category_id" style="width:100%;padding:0.4rem;">
                <option value="">-- None --</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?php echo htmlspecialchars($cat['id']); ?>" <?php echo ($category_id !== '' && (string)$category_id === (string)$cat['id']) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($cat['name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </label>
        <div style="display:flex;gap:0.5rem;">
            <button type="submit" style="padding:0.5rem 1rem;">Save</button>
            <a href="/admin/products/index.php" style="padding:0.5rem 1rem; border:1px solid #ccc;">Cancel</a>
        </div>
    </form>
</main>

<?php require __DIR__ . '/../../includes/footer.php'; ?>
