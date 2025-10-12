// Form validation and password toggle
document.getElementById('loginForm').addEventListener('submit', function(event) {
    const form = event.target;

    if (!form.checkValidity()) {
        event.preventDefault(); // stop if invalid
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
