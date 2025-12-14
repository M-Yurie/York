<?php
require 'includes/bootstrap.php';
$pageTitle = 'York | Home';
$pageStyles = ['styles/general.css', 'styles/main-page.css', 'styles/fonts.css'];
$pageScripts = ['js/main-page.js', 'js/general.js'];
require 'includes/header.php';
?>
<?php require 'includes/nav.php'; ?>

<main>
    <!-- hero section -->
    <div class="hero-section">
        <div class="visible">
            <div class="carousell-track">
                <div class="carousell-item active" id="item1"><img src="images/carousel/hero-section-image nr1.jpg" alt=""></div>
                <div class="carousell-item" id="item2"><img src="images/carousel/hero-section-image nr2.jpg" alt=""></div>
                <div class="carousell-item" id="item3"><img src="images/carousel/hero-section-image nr3.jpg" alt=""></div>
            </div>
        </div>
        <div class="carousell-text">
            <span>CHECK OUT OUR NEW SECTION</span>
            <h1>GUIDES</h1>
            <span>HERE YOU WILL FIND INSTRUCTIONS AND IDEAS FOR DIFFERENT CLOTHING STYLES THAT ARE POPULAR TODAY.</span>
        </div>
        <button class="car-nav-button" id="hero-section-back-button"><img src="icons/arrow-left.svg" alt=""></button>
        <button class="car-nav-button" id="hero-section-next-button"><img src="icons/arrow-right.svg" alt=""></button>
        <button class="call-to-action-button"><a href="#">LET ME SEE IT →</a></button>
    </div>

    <!-- brands line -->
    <div class="brands-line">
        <div class="brands-track">
            <img src="images/brands/adidas-seeklogo.svg" alt="">
            <img src="images/brands/ecco-shoes-seeklogo.svg" alt="">
            <img src="images/brands/Group.svg" alt="">
            <img src="images/brands/hm-seeklogo.svg" alt="">
            <img src="images/brands/nike-seeklogo.svg" alt="">
            <img src="images/brands/Page-1.svg" alt="">
            <img src="images/brands/pieces-seeklogo.svg" alt="">
            <img src="images/brands/puma-seeklogo.svg" alt="">
            <img src="images/brands/reebok-seeklogo.svg" alt="">
            <img src="images/brands/selected-femme-homme-seeklogo 1.svg" alt="">
            <img src="images/brands/topman-seeklogo.svg" alt="">
            <img src="images/brands/vila-clothes-seeklogo.svg" alt="">
            <img src="images/brands/wrangler-seeklogo.svg" alt="">
        </div>
    </div>


    <!-- intro section -->
    <section class="intro-section">
        <p>
            Curated. <span class="pink"><em>Diverse.</em></span> Effortless. <br>
            <span class="blue"><em>Welcome</em></span> to York. We bring you a 
            <span class="orange"><em>carefully</em></span> selected mix of styles from a wide range of brands — all in one place. <br>
            Whether you're into <span class="green"><em>timeless</em></span> classics or bold trends, you'll find pieces that speak your 
            <span class="pink"><em>language.</em></span>
        </p>
        <a href="products-page.php" class="shop-button">Let’s Shop!</a>
    </section>

    <!-- inspo section -->
     <section class="inspo-section">
        <h1>See some <span>Inspiraion</span></h1>
        <div class="inspo-tabs">
            <div class="inspo-tab active-tab" id="ininspo-tab-1">
                <p>Y2K revival</p>
            </div>
            <div class="inspo-content-exp visible" id="inspo-content-exp-1">
                <img src="images/outfits_y2k_revival.png" alt="">
                <div class='description'>
                    <h1>Y2K revival</h1>
                    <p>
                    Bold. Playful. Nostalgic. <br>
                    Y2K is all about turning heads and having fun with fashion. Inspired by the late '90s and early 2000s, this style blends futuristic vibes with retro pop culture. <br><br>
                    Think low-rise jeans, crop tops, shiny fabrics, mini skirts, and quirky accessories. It’s where tech meets glam — with a touch of attitude. <br><br>
                    Perfect for those who dare to be different, the Y2K look brings energy, color, and personality to every outfit.
                    </p>
                    <button>READ MORE</button>
                </div>
            </div>
            <div class="inspo-tab" id="ininspo-tab-2">
                <p>Soft Feminine</p>
            </div>
            <div class="inspo-content-exp" id="inspo-content-exp-2">
                <img src="images/outfits_soft_feminine.png" alt="">
                <div class='description'>
                    <h1>Soft Feminine</h1>
                    <p> Graceful. Delicate. Romantic. <br> 
                        Soft Feminine style embraces beauty in the details and celebrates a gentle, dreamy aesthetic. Think flowy fabrics, pastel tones, and timeless elegance. <br><br> 
                        Ruffles, lace, florals, puff sleeves, and soft silhouettes define this look. It’s about feeling beautiful, confident, and effortlessly graceful. <br><br> 
                        Ideal for those who love a touch of romance and charm in their wardrobe, this style turns every outfit into a quiet statement of elegance. 
                    </p>
                    <button>READ MORE</button>
                </div>
            </div>
            <div class="inspo-tab" id="ininspo-tab-3">
                <p>Minimalist Chick</p>
            </div>
            <div class="inspo-content-exp" id="inspo-content-exp-3">
                <img src="images/outfits_minimalist-chic.png" alt="">
                <div class='description'>
                    <h1>Minimalist Chic</h1>
                    <p> Clean. Sophisticated. Intentional. <br> 
                        Minimalist Chic is rooted in simplicity and quality, where less truly means more. It focuses on well-cut pieces, neutral colors, and effortless elegance. <br><br> 
                        Think tailored blazers, crisp shirts, monochrome outfits, and structured accessories. Each item serves a purpose — no fuss, no clutter. <br><br> 
                        Perfect for those who value timeless style, the Minimalist Chic look delivers polish, calm, and quiet confidence with every outfit. 
                    </p>
                    <button>READ MORE</button>
                </div>
            </div>
            <div class="inspo-tab" id="ininspo-tab-4">
                <p>Streetwear Utility</p>
            </div>
            <div class="inspo-content-exp" id="inspo-content-exp-4">
                <img src="images/outfits_streetwear-utility.png" alt="">
                <div class='description'>
                    <h1>Streetwear Utility</h1>
                    <p> Edgy. Functional. Urban. <br> 
                        Streetwear Utility merges fashion with purpose, drawing inspiration from workwear and city life. It’s bold, practical, and always in motion. <br><br> 
                        Cargo pants, oversized jackets, tactical vests, sneakers, and layered fits are staples. The focus is on comfort and functionality — with streetwise attitude. <br><br> 
                        Made for those who live life on the go, this style is a statement of self-expression, built for real-world wear with a fearless edge. 
                    </p>
                    <button>READ MORE</button>
                </div>
            </div>
            <div class="inspo-tab" id="ininspo-tab-5">
                <p>Athleisure</p>
            </div>
            <div class="inspo-content-exp" id="inspo-content-exp-5">
                <img src="images/outfits_athleisure.png" alt="">
                <div class='description'>
                    <h1>Athleisure</h1>
                    <p> Sporty. Comfortable. Cool. <br> 
                        Athleisure is where athletic wear meets everyday style. It’s all about blending performance with ease — looking good while feeling even better. <br><br> 
                        Leggings, hoodies, biker shorts, crop tops, and sleek sneakers dominate the look. It’s relaxed yet stylish, with a nod to fitness culture. <br><br> 
                        Perfect for those who want to stay active or just love the laid-back vibe, Athleisure is a lifestyle — not just a trend. 
                    </p>
                    <button>READ MORE</button>
                </div>
            </div>
        </div>
     </section>
    </main>

    

<?php require 'includes/footer.php'; ?>
