<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Velora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
    <?php require_once "./header.php"?>
    <section class="auth-container">
        <div class="container d-flex align-items-center justify-content-center min-vh-100">
            <div class="auth-form mx-auto animate__animated animate__fadeInUp">
                <h3 class="text-center mb-4 section-title">Welcome Back!</h3>
                <form id="loginForm" novalidate>
                    <div class="mb-3 form-floating position-relative">
                        <input type="email" class="form-control" id="email" placeholder="Email Address" required>
                        <label for="email">Email Address</label>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>
                    <div class="mb-3 form-floating position-relative">
                        <input type="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        <span class="password-toggle position-absolute end-0 top-50 translate-middle-y pe-3" style="cursor: pointer;">
                            <i class="fas fa-eye" id="togglePassword"></i>
                        </span>
                        <div class="invalid-feedback">Please enter your password.</div>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <a href="#" class="text-primary">Forgot Password?</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                </form>
                <div class="text-center">
                    <p class="mb-3">Or login with</p>
                    <div class="d-flex justify-content-center gap-3">
                        <button class="btn btn-outline-social"><i class="fab fa-google me-2"></i> Google</button>
                        <button class="btn btn-outline-social"><i class="fab fa-facebook-f me-2"></i> Facebook</button>
                    </div>
                    <p class="mt-3">No Account Yet? <a href="register.html" class="text-primary">Register Here</a></p>
                </div>
            </div>
        </div>
    </section>
    <?php require_once "./footer.php"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Form validation and password toggle
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const form = event.target;
            if (form.checkValidity()) {
                alert('Login successful!'); // Replace with backend submission
            } else {
                form.classList.add('was-validated');
            }
        });

        // Show/hide password toggle
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>