<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collections - Velora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
    <?php require_once "./header.php"?>
    <!-- Collections Section -->
    <section class="collections-section py-5">
        <div class="container">
            <h2 class="text-center mb-5 section-title animate__animated animate__fadeIn">Explore Our Collections</h2>
            <!-- Filter Bar -->
            <div class="filter-bar d-flex justify-content-center gap-3 mb-5 animate__animated animate__fadeIn animate__delay-1s">
                <button class="btn btn-outline-filter active" data-filter="all">All</button>
                <button class="btn btn-outline-filter" data-filter="men">Men</button>
                <button class="btn btn-outline-filter" data-filter="women">Women</button>
                <button class="btn btn-outline-filter" data-filter="accessories">Accessories</button>
            </div>
            <!-- Collection Grid -->
            <div class="row g-4" id="collectionGrid">
                <!-- Collection Item 1 -->
                <div class="col-12 col-md-6 col-lg-4 collection-item" data-category="men">
                    <div class="card animate__animated animate__fadeInUp">
                        <img src="https://images.unsplash.com/photo-1507680434187-7a00a694e1ad" class="card-img-top" alt="Men's Casual Collection">
                        <div class="card-body text-center">
                            <h5 class="card-title">Men's Casual Elegance</h5>
                            <p class="card-text">Timeless style with modern comfort.</p>
                            <a href="#" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
                <!-- Collection Item 2 -->
                <div class="col-12 col-md-6 col-lg-4 collection-item" data-category="women">
                    <div class="card animate__animated animate__fadeInUp animate__delay-1s">
                        <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f" class="card-img-top" alt="Women's Chic Collection">
                        <div class="card-body text-center">
                            <h5 class="card-title">Women's Chic Couture</h5>
                            <p class="card-text">Bold designs for the modern woman.</p>
                            <a href="#" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
                <!-- Collection Item 3 -->
                <div class="col-12 col-md-6 col-lg-4 collection-item" data-category="accessories">
                    <div class="card animate__animated animate__fadeInUp animate__delay-2s">
                        <img src="https://images.unsplash.com/photo-1524805444427-1712ec0a2b2c" class="card-img-top" alt="Luxury Accessories">
                        <div class="card-body text-center">
                            <h5 class="card-title">Luxury Accessories</h5>
                            <p class="card-text">Elevate your style with premium accessories.</p>
                            <a href="#" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
                <!-- Collection Item 4 -->
                <div class="col-12 col-md-6 col-lg-4 collection-item" data-category="men">
                    <div class="card animate__animated animate__fadeInUp animate__delay-3s">
                        <img src="https://images.unsplash.com/photo-1590402494682-7b5fb089cb8b" class="card-img-top" alt="Men's Formal Collection">
                        <div class="card-body text-center">
                            <h5 class="card-title">Men's Formal Attire</h5>
                            <p class="card-text">Sophisticated suits for every occasion.</p>
                            <a href="#" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
                <!-- Collection Item 5 -->
                <div class="col-12 col-md-6 col-lg-4 collection-item" data-category="women">
                    <div class="card animate__animated animate__fadeInUp animate__delay-4s">
                        <img src="https://images.unsplash.com/photo-1496747611176-843d2d9c52e7" class="card-img-top" alt="Women's Summer Collection">
                        <div class="card-body text-center">
                            <h5 class="card-title">Women's Summer Vibes</h5>
                            <p class="card-text">Light, breezy styles for warm days.</p>
                            <a href="#" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
                <!-- Collection Item 6 -->
                <div class="col-12 col-md-6 col-lg-4 collection-item" data-category="accessories">
                    <div class="card animate__animated animate__fadeInUp animate__delay-5s">
                        <img src="https://images.unsplash.com/photo-1509343256512-d77a5cb3791b" class="card-img-top" alt="Statement Jewelry">
                        <div class="card-body text-center">
                            <h5 class="card-title">Statement Jewelry</h5>
                            <p class="card-text">Bold pieces to complete your look.</p>
                            <a href="#" class="btn btn-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured Promotion -->
            <div class="text-center mt-5 animate__animated animate__fadeIn animate__delay-6s">
                <h3 class="section-title">Discover Exclusive Deals</h3>
                <p class="lead mb-4">Join Velora now to unlock special offers on our latest collections!</p>
                <a href="register.html" class="btn btn-secondary">Sign Up Today</a>
            </div>
        </div>
    </section>
    <?php require_once "./footer.php"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Filter functionality
        document.querySelectorAll('.btn-outline-filter').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('.btn-outline-filter').forEach(btn => btn.classList.remove('active'));
                // Add active class to clicked button
                this.classList.add('active');
                // Get filter value
                const filter = this.getAttribute('data-filter');
                // Show/hide collection items
                document.querySelectorAll('.collection-item').forEach(item => {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>