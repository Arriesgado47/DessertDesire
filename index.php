<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desert Desire - Indulge in Sweetness</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
    <link rel="icon" href="image/favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <img src="image/desert desire logo.png" alt="Desert Desire Logo" class="preloader-logo">
    </div>

    <!-- Header -->
    <header>
        <div class="logo-container">
            <img src="image/desert desire logo.png" alt="Desert Desire Logo" class="logo">
        </div>
        <div class="title-container">
            <h1>Dessert Desire</h1>
            <p>Your Sweet Escape</p>
        </div>
        <div class="auth-container">
            <?php if (isset($_SESSION['user'])): ?>
                <p>Welcome, <?php echo htmlspecialchars($_SESSION['user']); ?>!</p>
                <button class="auth-button" onclick="location.href='logout.php'">Logout</button>
            <?php else: ?>
                <a href="login.php" class="auth-button">Login/Register</a>
            <?php endif; ?>
        </div>
    </header>

    <!-- Navigation -->
    <nav>
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="#locations">Locations</a></li>
            <li><a href="#testimonials">Testimonials</a></li>
            <li><a href="#feedback">Feedback</a></li>
            <li><a href="#payment">Payment</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main>
        <section id="home" class="banner">
            <h2>Indulge in Sweetness</h2>
            <p>Discover our handcrafted desserts made with love.</p>
            <img src="image/banner.jpg" alt="Delicious Desserts" class="banner-image">
        </section>

 <!-- Products Section (Carousel) -->
 <section id="carousel">
            <h2 class="heading">Featured Products</h2>
            <div class="product-carousel">
                <div class="carousel-slide">
                    <img src="image/product1.jpeg" alt="Product 1">
                </div>
                <div class="carousel-slide">
                    <img src="image/product2.jpeg" alt="Product 2">
                </div>
                <div class="carousel-slide">
                    <img src="image/product3.jpeg" alt="Product 3">
                </div>
                <div class="carousel-slide">
                    <img src="image/product4.jpeg" alt="Product 4">
                </div>
                <div class="carousel-slide">
                    <img src="image/product5.jpeg" alt="Product 5">
                </div>
            </div>
        </section>

</section>

</section>

</section>


        <!-- Products Section (Categories) -->
        <section id="products">
            <h2 class="heading">Our Products</h2>
            <div class="categories">
                <button onclick="showCategory('cakes')" class="expand-button">Cakes</button>
                <button onclick="showCategory('pastries')" class="expand-button">Pastries</button>
                <button onclick="showCategory('sweets')" class="expand-button">Sweets</button>
                <button onclick="showCategory('desserts')" class="expand-button">Desserts</button>
            </div>

            <!-- Cake Category (hidden by default) -->
<!-- Cake Category -->
<div id="cakes" class="category-products" style="display: none;">
    <div class="product-item">
        <img src="image/chocolate cake.jpeg" alt="Chocolate Cake">
        <h3>Chocolate Cake</h3>
        <label for="quantity1">Quantity:</label>
        <input type="number" id="quantity1" name="quantity" value="1" min="1">
        <p>Rate: $14.70</p>
        <button onclick="addToCart('Chocolate Cake', 14.70, document.getElementById('quantity1').value)">Add to Cart</button>
    </div>
    <div class="product-item">
        <img src="image/strawberry cake.jpeg" alt="Strawberry Cake">
        <h3>Strawberry Cake</h3>
        <label for="quantity2">Quantity:</label>
        <input type="number" id="quantity2" name="quantity" value="1" min="1">
        <p>Rate: $14.70</p>
        <button onclick="addToCart('Strawberry Cake', 14.70, document.getElementById('quantity2').value)">Add to Cart</button>
    </div>
    <div class="product-item">
        <img src="image/chocovanilla cake.jpeg" alt="ChocoVanilla Cake">
        <h3>ChocoVanilla Cake</h3>
        <label for="quantity3">Quantity:</label>
        <input type="number" id="quantity3" name="quantity" value="1" min="1">
        <p>Rate: $14.70</p>
        <button onclick="addToCart('ChocoVanilla Cake', 14.70, document.getElementById('quantity3').value)">Add to Cart</button>
    </div>
    <div class="product-item">
        <img src="image/butterschotch cake.jpeg" alt="Butterschotch Cake">
        <h3>Butterschotch Cake</h3>
        <label for="quantity4">Quantity:</label>
        <input type="number" id="quantity4" name="quantity" value="1" min="1">
        <p>Rate: $14.70</p>
        <button onclick="addToCart('Butterschotch Cake', 14.70, document.getElementById('quantity4').value)">Add to Cart</button>
    </div>
    <div class="product-item">
        <img src="image/red velvet cake.jpeg" alt="Red Velvet Cake">
        <h3>Red Velvet Cake</h3>
        <label for="quantity5">Quantity:</label>
        <input type="number" id="quantity5" name="quantity" value="1" min="1">
        <p>Rate: $14.70</p>
        <button onclick="addToCart('Red Velvet Cake', 14.70, document.getElementById('quantity5').value)">Add to Cart</button>
    </div>
</div>

</div>

            <!-- Pastries, Sweets, Desserts categories go here -->
            <div id="pastries" class="category-products" style="display: none;">
                <div class="product-item">
                    <img src="image/pastry1.jpg" alt="Pastry 1">
                    <h3>Vanilla Pastry</h3>
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="pastry-quantity" name="quantity" value="1" min="1">
                    <p>Rate: $12.50</p>
                    <button onclick="addToCart('Vanilla Pastry', 12.50, document.getElementById('pastry-quantity').value)">Add to Cart</button>
                </div>
            </div>

            <div id="sweets" class="category-products" style="display: none;">
                <div class="product-item">
                    <img src="image/sweet1.jpg" alt="Sweet 1">
                    <h3>Strawberry Sweet</h3>
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="sweet-quantity" name="quantity" value="1" min="1">
                    <p>Rate: $10.00</p>
                    <button onclick="addToCart('Strawberry Sweet', 10.00, document.getElementById('sweet-quantity').value)">Add to Cart</button>
                </div>
            </div>

            <div id="desserts" class="category-products" style="display: none;">
                <div class="product-item">
                    <img src="image/dessert1.jpg" alt="Dessert 1">
                    <h3>Chocolate Mousse</h3>
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="dessert-quantity" name="quantity" value="1" min="1">
                    <p>Rate: $15.00</p>
                    <button onclick="addToCart('Chocolate Mousse', 15.00, document.getElementById('dessert-quantity').value)">Add to Cart</button>
                </div>
            </div>

        </section>

        <!-- Cart Section -->
<section id="cart">
    <h2>Your Cart</h2>
    <button onclick="location.href='cart.php'">View Cart</button>
</section>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="comment-section">
                <h3>Leave a Comment</h3>
                <form action="comment.php" method="POST">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="comment">Comment:</label>
                    <textarea id="comment" name="comment" required></textarea>

                    <button type="submit">Submit</button>
                </form>
            </div>
            <div class="testimonial-section">
                <h3>Testimonials</h3>
                <blockquote>"The best dessert shop I've ever visited!" - Jane Doe</blockquote>
                <blockquote>"Delicious treats and wonderful service." - John Smith</blockquote>
            </div>
            <div class="contact-section">
                <h3>Contact Us</h3>
                <p>Dhaka Shop: 0123-456789</p>
                <p>Chittagong Shop: 0987-654321</p>
            </div>
        </div>
        <p>&copy; 2024 Desert Desire. All rights reserved.</p>
    </footer>
</body>
</html>
