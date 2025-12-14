<?php
$pageTitle = 'York | Favorites';
$pageStyles = ['styles/general.css', 'styles/favorites-page.css', 'styles/fonts.css'];
$pageScripts = ['js/favorites-page.js', 'js/general.js'];
require 'includes/header.php';
?>
<?php require 'includes/nav.php'; ?>

<main>
    <!-- page name -->
    <div class="page-name">
        <h1>You wishlist</h1>
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
