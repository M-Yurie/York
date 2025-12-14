<?php
$pageTitle = 'York | Products';
$pageStyles = ['styles/general.css', 'styles/products-page.css', 'styles/fonts.css'];
$pageScripts = ['js/products-page.js', 'js/general.js'];
require 'includes/header.php';
?>
<?php require 'includes/nav.php'; ?>

<main>
    <!-- page name -->
    <div class="page-name">
        <h1>Products</h1>
    </div>

    <!-- products manipulation -->
     <div class="products-manipulation">
        <div class="button pink" id="sort-by-type-button">
            Type: <span id="product-type-value">All</span>
            <img src="icons/🦆 icon _chevron-down_.svg" alt="">
            <div id="product-type-dropdown" class="product-type-dropdown hidden">
<div class="dropdown-item" data-value="all">All</div>
<div class="dropdown-item" data-value="blazer">Blazers</div>
<div class="dropdown-item" data-value="coat">Coats</div>
<div class="dropdown-item" data-value="dresse">Dresses</div>
<div class="dropdown-item" data-value="hoodie">Hoodies</div>
<div class="dropdown-item" data-value="jacket">Jackets</div>
<div class="dropdown-item" data-value="jean">Jeans</div>
<div class="dropdown-item" data-value="pant">Pants</div>
<div class="dropdown-item" data-value="shirt">Shirts</div>
<div class="dropdown-item" data-value="sweater">Sweaters</div>
<div class="dropdown-item" data-value="t-shirt">T-Shirts</div>
            </div>
        </div>
        <div class="button pink" id="sort-by-size-button">
            Size: <span id="size-value">Any</span>
            <img src="icons/🦆 icon _chevron-down_.svg" alt="">
            <div id="size-dropdown" class="size-dropdown hidden">
                <div class="dropdown-item" data-value="any">Any</div>
                <div class="dropdown-item" data-value="xs">XS</div>
                <div class="dropdown-item" data-value="s">S</div>
                <div class="dropdown-item" data-value="m">M</div>
                <div class="dropdown-item" data-value="l">L</div>
                <div class="dropdown-item" data-value="xl">XL</div>
                <div class="dropdown-item" data-value="xxl">XXL</div>
            
            </div>
        </div>
        <div class="button green" id="order-by-button">
            Order by: <span id="order-by-value">Rating Asc</span>
            <img src="icons/🦆 icon _chevron-down_.svg" alt="">
            <div id="order-by-dropdown" class="order-by-dropdown hidden">
                <div class="dropdown-item" data-value="rating-asc">Rating Asc</div>
                <div class="dropdown-item" data-value="rating-desc">Rating Desc</div>
                <div class="dropdown-item" data-value="price-asc">Price: Low to High</div>
                <div class="dropdown-item" data-value="price-desc">Price: High to Low</div>
                <div class="dropdown-item" data-value="newest">Newest</div>
                <div class="dropdown-item" data-value="oldest">Oldest</div>

            </div>
        </div>
     </div>

    <!-- products cards -->
     <div class="products-cards">
        <!-- <div class="card">
            <div class="card-image">
                <div class="favorite-icon">
                    <img src="icons/add to favorite blank.svg" alt="">
                </div>
            </div>
            <div class="card-description">
                <p>Breezaya Women's Floral White Shirt</p>
                <span>8.09€</span>
                <button>Add to cart</button>
            </div>
        </div> -->
     </div>
    </main>
    
    

<?php require 'includes/footer.php'; ?>
