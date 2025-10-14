<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Velora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>
    <?php require_once "../views/includes/header.php"?>

    <!-- Registration Section -->
    <section class="auth-container">
        <div class="container d-flex align-items-center justify-content-center min-vh-100">
            <div class="auth-form mx-auto animate__animated animate__fadeInUp">
                <h3 class="text-center mb-4 section-title">Create Your Velora Account</h3>
                <form id="registerForm" action="../controller/registrationController.php" method="post" novalidate>
                    <div class="mb-3 form-floating position-relative">
                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name" required>
                        <label for="fullName">Full Name</label>
                        <div class="invalid-feedback">Please enter your full name.</div>
                    </div>
                    <div class="mb-3 form-floating position-relative">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                        <label for="email">Email Address</label>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>
                    <div class="mb-3 form-floating position-relative">
                        <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                        <label for="email">Phone No</label>
                        <div class="invalid-feedback">Please enter a valid phone number.</div>
                    </div>
                    <div class="mb-3 form-floating position-relative">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        <span class="password-toggle position-absolute end-0 top-50 translate-middle-y pe-3" style="cursor: pointer;">
                            <i class="fas fa-eye" id="togglePassword"></i>
                        </span>
                        <div class="invalid-feedback">Password must be at least 8 characters long.</div>
                    </div>
                    <div class="mb-3 form-floating position-relative">
                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                        <label for="confirmPassword">Confirm Password</label>
                        <span class="password-toggle position-absolute end-0 top-50 translate-middle-y pe-3" style="cursor: pointer;">
                            <i class="fas fa-eye" id="toggleConfirmPassword"></i>
                        </span>
                        <div class="invalid-feedback" id="confirmPasswordFeedback">Passwords do not match.</div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-3">Register Now</button>
                </form>
                <div class="text-center">
                    <p class="mb-3">Or register with</p>
                    <div class="d-flex justify-content-center gap-3">
                        <button class="btn btn-outline-social"><i class="fab fa-google me-2"></i> Google</button>
                        <button class="btn btn-outline-social"><i class="fab fa-facebook-f me-2"></i> Facebook</button>
                    </div>
                    <p class="mt-3">Already have an account? <a href="./login.php" class="text-primary">Login here</a></p>
                </div>
            </div>
        </div>
    </section>
    <?php require_once "./footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../assets/Javascripts/registration.js"></script>
</body>

</html>