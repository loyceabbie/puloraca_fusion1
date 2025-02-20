<?php
session_start();
$isLoggedIn = isset($_SESSION["user_id"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puloraca Fusion - Modern Japanese Cuisine</title>
    <link rel="stylesheet" href="HTML AND OTHER PAGES/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <a href="index.php" class="logo">PULORACA FUSION</a>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="puloraca1.github.io/HTML AND OTHER PAGES/Menu/menu.php">Menu</a>
                <a href="puloraca1.github.io/HTML AND OTHER PAGES/ABOUTUS.png">About Us</a>
                <?php if ($isLoggedIn): ?>
                    <span>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></span>
                    <a href="HTML AND OTHER PAGES/login/logout.php" class="logout-button">Logout</a>
                <?php else: ?>
                    <a href="HTML AND OTHER PAGES/login/login.html" class="login-button">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>


    <section class="hero">
        <div class="hero-content">
            <h1>
                Experience<br>
                Modern Japanese<br>
                Fusion
            </h1>
            <a href="puloraca1.github.io/HTML AND OTHER PAGES/reservations/reserve.php" class="cta-button">RESERVE TABLE</a>
        </div>
    </section>


    <section class="featured">
        <h2>Featured Dishes</h2>
        <div class="carousel-container">
            <button class="carousel-button prev" aria-label="Previous slide">❮</button>
            <div class="carousel-track-container">
                <div class="carousel-track">
                    <div class="featured-item">
                        <img src="HTML AND OTHER PAGES\fusionroll.jpg" alt="Puloraca Special Roll">
                        <div class="featured-text">
                            <h3>Puloraca Special Roll</h3>
                            <p>Premium salmon, avocado, and special sauce</p>
                            <span class="price">€25</span>
                        </div>
                    </div>
                    <div class="featured-item">
                        <img src="HTML AND OTHER PAGES\Premiumbeef.jpg" alt="Beef Gyudon">
                        <div class="featured-text">
                            <h3>Beef Gyudon</h3>
                            <p>Premium beef with modern twist</p>
                            <span class="price">€27.50</span>
                        </div>
                    </div>
                    <div class="featured-item">
                        <img src="HTML AND OTHER PAGES\matcha.jpg" alt="Matcha Cheesecake">
                        <div class="featured-text">
                            <h3>Matcha Cheesecake</h3>
                            <p>Contemporary matcha dessert</p>
                            <span class="price">€10</span>
                        </div>
                    </div>
                    <div class="featured-item">
                        <img src="HTML AND OTHER PAGES\tempura.jpg" alt="Tempura Platter">
                        <div class="featured-text">
                            <h3>Tempura Platter</h3>
                            <p>Assorted seafood and vegetable tempura</p>
                            <span class="price">€28</span>
                        </div>
                    </div>
                    <div class="featured-item">
                        <img src="HTML AND OTHER PAGES\yakitori.jpg" alt="Yakitori">
                        <div class="featured-text">
                            <h3>Yakitori</h3>
                            <p>Fried Octopus Balls</p>
                            <span class="price">€28</span>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-button next" aria-label="Next slide">❯</button>
            
            <div class="carousel-nav">
                <button class="carousel-indicator active"></button>
                <button class="carousel-indicator"></button>
                <button class="carousel-indicator"></button>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="about-container">
            <div class="about-image">
                <img src="HTML AND OTHER PAGES\Interior.jpg" alt="Restaurant Interior">
            </div>
            <div class="about-content">
                <h2>Our Story</h2>
                <p>Puloraca Fusion brings together traditional Japanese cuisine with modern culinary innovations. Our expert chefs craft unique dishes that honor tradition while embracing contemporary flavors.</p>
                <p>Located in the heart of Hämeenlinna, we offer an unforgettable dining experience that combines authentic tastes with modern presentation. </p>
                <p>Embark on a culinary adventure at Puloraca Fusion. We're a haven where tradition meets innovation, where ancient Japanese flavors dance with contemporary artistry. Prepare to be captivated by our unique dishes and an unforgettable dining experience.</p>  
                <p>Puloraca is coined from the fusion of our names: Puspa, Lois, Rakshya and Chetana; PULORACA!!</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-container">
            <div class="footer-info">
                <p>© 2025 Puloraca Fusion</p>
                <address>
                    123 Puloraca Fusion Street<br>
                    Hämeenlinna, Finland<br>
                    Tel: +358 04-457-6152
                </address>
            </div>
            <div class="footer-links">
                <a href="puloraca1.github.io/HTML AND OTHER PAGES/privacy.html">Privacy Policy</a>
                <a href="puloraca1.github.io/HTML AND OTHER PAGES/contact form/contact.html">Contact Us</a>
                <a href="puloraca1.github.io/HTML AND OTHER PAGES/feedback/feedback_form.html">Feedback</a>
                <a href="puloraca1.github.io/HTML AND OTHER PAGES/login/login.html">Login</a>
            </div>
        </div>
    </footer>
    <script src="HTML AND OTHER PAGES/carousel.js"></script>
    <script src="HTML AND OTHER PAGES/nav.js"></script>
</body>
</html>