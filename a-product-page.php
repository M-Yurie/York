<?php
require 'includes/bootstrap.php';

$pdo = db();
$productId = $_GET['id'] ?? null;
if (!$productId) {
    header('Location: /404.php');
    exit;
}

$stmt = $pdo->prepare('SELECT p.*, c.slug AS category_slug FROM products p LEFT JOIN categories c ON p.category_id = c.id WHERE p.id = ? LIMIT 1');
$stmt->execute([$productId]);
$productRow = $stmt->fetch();
if (!$productRow) {
    header('Location: /404.php');
    exit;
}

$productData = [
    'id' => (string)$productRow['id'],
    'name' => $productRow['name'],
    'price' => (float)$productRow['price'],
    'description' => $productRow['description'] ?? '',
    'main-image' => $productRow['main_image'] ?? '',
    'images' => array_values(array_filter([$productRow['main_image']])),
    'size' => [],
    'color' => [],
    'rating' => 0,
    'date-added' => substr((string)($productRow['created_at'] ?? ''), 0, 10),
    'type' => $productRow['category_slug'] ?? 'all',
];

$pageTitle = 'York | Product';
$pageStyles = ['styles/general.css', 'styles/a-product-page.css', 'styles/fonts.css'];
$pageScripts = ['js/general.js', 'js/a-product-page.js'];
require 'includes/header.php';
?>
<?php require 'includes/nav.php'; ?>

<main>
        <section class="product-view">
            <div class="left">
                <div class="main-image"></div>
                <div class="images-nav">
                    <img src="icons/arrow-left.svg" id="arrow-left" alt="">
                    <div class="thumbnails"></div>
                    <img src="icons/arrow-right.svg" id="arrow-right" alt="">
                </div>
            </div>
            <div class="right">
                <div>
                    <h1></h1>
                    <span class="price">0.00€</span>
                    <p class="about-taxes">TAXES INCLUDED. SHIPPING CALCULATED AT CHECKOUT.</p>
                    <div class="size-selection">
                        <span>Size:</span>
                        <div class="size-options">
                        </div>
                    </div>
                    <div class="color-selection">
                        <span>Color:</span>
                        <div class="color-options">
                        </div>
                    </div>
                    <div class="quantity-selection">
                        <span>Quantity:</span>
                        <div class="quantity-controls">
                            <button id="decrease-quantity">-</button>
                            <div id="quantity-input">1</div>
                            <button id="increase-quantity">+</button>
                        </div>
                    </div>
                    <button class="add-to-cart">ADD TO CART</button>
                    <button class="wishlist-togle">
                        ADD TO WISHLIST
                        <img src="icons/heart_icon_orange_filled.svg" alt="heart_icon_orange">
                    </button>
                </div>
                <div class="description">
                    <div class="description-tab" id="description-tab-1">
                        <span>SIZE & FIT</span>
                        <span>+</span>
                    </div>
                    <div class="description-content hidden" id="description-content-1">
                        <p>Model is 6'2" and wears a size M.</p>
                        <p>Fits true to size, take your normal size.</p>
                        <p>Regular fit, designed to be worn with a looser fit.</p>
                    </div>
                    <div class="line"></div>
                    <div class="description-tab" id="description-tab-2">
                        <span>SHIPPING & DELIVERY</span>
                        <span>+</span>
                    </div>
                    <div class="description-content hidden" id="description-content-2">
                        <p>Free shipping on all orders over 50€.</p>
                        <p>Standard delivery takes 3-5 business days.</p>
                        <p>Express delivery available for an additional fee.</p>
                    </div>
                    <div class="line"></div>
                    <div class="description-tab" id="description-tab-3">
                        <span>RETURNS & EXCHANGES</span>
                        <span>+</span>
                    </div>
                    <div class="description-content hidden" id="description-content-3">
                        <p>Returns accepted within 30 days of purchase.</p>
                        <p>Items must be unworn and in original packaging.</p>
                        <p>Exchanges available for different sizes or colors.</p>
                    </div>
                </div>
            </div>
    </section>
    </main>
    
    <script>
        window.productData = <?php echo json_encode($productData, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT); ?>;
    </script>

<?php require 'includes/footer.php'; ?>
