<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Velora - Premium Clothing</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php require_once "./views/includes/header.php" ?>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Elevate Your Style with Velora</h1>
            <p class="lead">Discover premium clothing crafted for elegance, comfort, and timeless style. Explore our exclusive collections today.</p>
            <div class="mt-4">
                <a href="./views/collections.php" class="btn btn-primary btn-lg mx-2">Shop Now</a>
                <a href="./views/collections.php" class="btn btn-secondary btn-lg mx-2">Explore Collections</a>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-5">
        <div class="container">
            <h2 class="section-title text-center">Featured Collections</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1551488831-00ddcb6c6bd3" class="card-img-top" alt="Men's Jacket">
                        <div class="card-body">
                            <h5 class="card-title">Men's Classic Jacket</h5>
                            <p class="card-text">Timeless style with premium materials. Perfect for any season.</p>
                            <p class="card-text"><strong>$89.99</strong></p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1591195853828-11db59a44f6b" class="card-img-top" alt="Women's Dress">
                        <div class="card-body">
                            <h5 class="card-title">Women's Elegant Dress</h5>
                            <p class="card-text">Sophisticated design for every occasion.</p>
                            <p class="card-text"><strong>$69.99</strong></p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://images.unsplash.com/photo-1521335625578-37f34a66f895" class="card-img-top" alt="Casual Shirt">
                        <div class="card-body">
                            <h5 class="card-title">Unisex Casual Shirt</h5>
                            <p class="card-text">Versatile and comfortable for everyday wear.</p>
                            <p class="card-text"><strong>$39.99</strong></p>
                            <a href="#" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <h2 class="section-title text-center">About Velora</h2>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p>At Velora, we believe in creating clothing that combines style, comfort, and sustainability. Our collections are designed with precision, using high-quality materials to ensure you look and feel your best. From casual wear to elegant outfits, Velora is your destination for timeless fashion.</p>
                    <a href="#" class="btn btn-primary mt-3">Learn More</a>
                </div>
                <div class="col-md-6">
                    <img src="./assets/img/about.jpg"
                        class="img-fluid rounded w-50 mx-auto d-block"
                        alt="About Velora">

                </div>

            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section">
        <div class="container">
            <h2 class="section-title text-center">What Our Customers Say</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card text-center">
                        <p>"The quality of Velora's clothing is unmatched. I love how stylish and comfortable everything is!"</p>
                        <p><strong>- Sarah M.</strong></p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card text-center">
                        <p>"Fast shipping and amazing customer service. Velora is now my go-to for all my wardrobe needs."</p>
                        <p><strong>- James T.</strong></p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="testimonial-card text-center">
                        <p>"The dresses are elegant and fit perfectly. I always get compliments when I wear Velora!"</p>
                        <p><strong>- Emily R.</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="section-title">Join the Velora Community</h2>
            <p class="lead">Sign up for exclusive offers, style tips, and early access to new collections.</p>
            <div class="input-group mb-3 w-50 mx-auto">
                <input type="email" class="form-control" placeholder="Enter your email" aria-label="Email">
                <button class="btn btn-primary" type="button">Subscribe</button>
            </div>
        </div>
    </section>

    <?php require_once "./views/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>