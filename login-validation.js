// login-validation.js
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const errorMessage = document.getElementById('error-message');

    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        let isValid = true;
        let errors = [];

        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            errors.push('Please enter a valid email address');
            isValid = false;
        }

        // Password validation
        if (password.length < 8) {
            errors.push('Password must be at least 8 characters long');
            isValid = false;
        }

        if (!isValid) {
            errorMessage.textContent = errors.join('. ');
            return;
        }

        // If validation passes, submit the form
        this.submit();
    });

    // Clear error message when user starts typing
    document.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', () => {
            errorMessage.textContent = '';
        });
    });
});