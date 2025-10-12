// --- Registration Form Submit Handler ---
document.getElementById('registerForm').addEventListener('submit', function (event) {
    const form = event.target;
    const fullName = document.getElementById('fullName').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirmPassword').value.trim();
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const confirmPasswordFeedback = document.getElementById('confirmPasswordFeedback');
    let isValid = true;

    // --- Reset previous validation states ---
    confirmPasswordInput.classList.remove('is-invalid');
    document.getElementById('password').classList.remove('is-invalid');

    // --- Password match validation ---
    if (password !== confirmPassword) {
        confirmPasswordInput.classList.add('is-invalid');
        confirmPasswordFeedback.textContent = 'Passwords do not match.';
        isValid = false;
    }

    // --- Password length validation ---
    if (password.length < 8) {
        document.getElementById('password').classList.add('is-invalid');
        isValid = false;
    }

    // --- Check built-in HTML validity (name, email, etc.) ---
    if (!form.checkValidity()) {
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault(); // stop submission if invalid
        form.classList.add('was-validated');
    }
    // if valid, the form naturally submits to registerController.php
});

// --- Password visibility toggle for main password ---
const togglePassword = document.getElementById('togglePassword');
const passwordInput = document.getElementById('password');
togglePassword.addEventListener('click', function () {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
});

// --- Password visibility toggle for confirm password ---
const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
const confirmPasswordInput = document.getElementById('confirmPassword');
toggleConfirmPassword.addEventListener('click', function () {
    const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmPasswordInput.setAttribute('type', type);
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
});