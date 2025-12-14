    <!-- footer section -->
    <footer>
        <div class="left">
            <h5>Company</h5>
            <a href="#">SHIPPING</a>
            <a href="#">ENVIROMENTAL STATEMENT</a>
            <a href="#">RETURNS & REFUNDS</a>
            <a href="#">PRIVACY</a>
            <a href="#">TERMS OF SERVICE</a>

            <h5>Information</h5>
            <a href="#">ABOUT US</a>
            <a href="#">OUR LOCATIONS</a>
        </div>
        <div class="center">
            <img src="icons/LOGO_big.svg" alt="">
            <span>Ac 2025, YORK | DESIGN & WEBSITE CREDIT | DEVELOPMENT CREDIT</span>
        </div>
        <div class="right">
            <a href="https://www.instagram.com/von_qota/" target="_blank"> <img src="icons/dYİ+ icon _instagram fill icon_.svg" alt="instagram_icon" class="icon"> </a>          
            <a href="https://www.tiktok.com/" target="_blank"> <img src="icons/dYİ+ icon _tiktok_.svg" alt="tiktok_icon" class="icon"> </a>
            <a href="https://t.me/M_Yurie" target="_blank"> <img src="icons/dYİ+ icon _telegram plane_.svg" alt="telegram_icon" class="icon"> </a>
        </div>
    </footer>

<?php
$pageScripts = $pageScripts ?? [];
foreach ($pageScripts as $script): ?>
    <script src="<?php echo htmlspecialchars($script); ?>"></script>
<?php endforeach; ?>
</body>
</html>
