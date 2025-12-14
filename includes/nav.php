    <!-- announcement bar -->
    <div class="announcement-bar">
        <div class="left">
            <a href="https://www.instagram.com/von_qota/" target="_blank"> <img src="icons/instagram_icon_green.svg" alt="instagram_icon_green" class="icon"> </a>          
            <a href="https://www.tiktok.com/" target="_blank"> <img src="icons/tiktok_icon_green.svg" alt="tiktok_icon_green" class="icon"> </a>
            <a href="https://t.me/M_Yurie" target="_blank"> <img src="icons/telegram_icon_green.svg" alt="telegram_icon_green" class="icon"> </a>
        </div>
        <div class="center">
            <span>Free MD delivery over 50ƒ,ª</span>
        </div>
        <div class="right"></div>
    </div>

    <!-- header -->
     <header>
        <div class="header">
            <div class="left">
                <div class="menu-togle">ƒ~ø</div>
                <div class="search-button">
                    <img src="icons/search_icon_orange.svg" alt="search_icon_orange">
                    <span>Search...</span>
                </div>            <div class="menu-options">
                    <a href="products-page.php">Products</a>
                    <a href="404.php">Instafashion</a>
                </div>
            </div>
            <div class="center">
                <a href="index.php"><img src="icons/LOGO.svg" alt="York"></a>
            </div>
            <div class="right">
                <div class="menu-options">
                    <a href="#">Guides</a>
                    <a href="#">Stores</a>
                    <a href="#">Contact Us</a>
                </div>
                <div class="icons">
                    <a href="favorites-page.php"><img src="icons/heart_icon_orange.svg" alt="heart_icon_orange"></a>
                    <span id="shopbag-button"><img src="icons/shopbag_icon_orange.svg" alt="shopbag_icon_orange"></span>
                    <a href="account-page.php" id="profile-link"><img src="icons/profile_icon_orange.svg" alt="profile_icon_orange"></a>                </div>
            </div>
        </div>
        <div id="search-modal" class="search-modal hidden">
            <div class="search-box">
                <input type="text" id="search-input" placeholder="What are you looking for?">
                <button id="search-submit"></button>
            </div>
        </div>
        <div id="menu-modal" class="menu-modal hidden">
            <div class="menu-box">
                <div class="menu-header">
                    <span>Menu</span>
                    <button id="menu-close-button">ƒo</button>
                </div>
                <div class="menu-content">
                    <a href="products-page.php">Products</a>
                    <a href="instafashion-page.php">Instafashion</a>
                    <a href="#">Guides</a>
                    <a href="#">Stores</a>
                    <a href="#">Contact Us</a>
                </div>
            </div>
        </div>
        <div id="cart-modal" class="cart-modal hidden">
            <div class="cart-box">
                <div class="cart-header">
                    <span>Your cart</span>
                    <button id="cart-close-button">ƒo</button>
                </div>
                <div class="cart-items">
                    <!-- Cart items will be dynamically added here -->
                    <p>Your shopping bag is empty.</p>
                
                </div>
                <div class="cart-footer">
                    <span class="flex"><span>Total: </span><span id="cart-total">0.00ƒ,ª</span></span>
                    <button id="checkout-button">Checkout</button>
                </div>
            </div>
        </div>
     </header>
