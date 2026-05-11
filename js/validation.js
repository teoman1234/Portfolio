/**
 * Form Validation
 * Tüm form validasyonları bu dosyada yapılır
 */

const validateEmail = (email) => {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
};

const validateForm = (name, email, message) => {
    const errors = {};

    // Name Validation
    if (!name || name.trim() === '') {
        errors.name = 'Name is required';
    } else if (name.trim().length < 3) {
        errors.name = 'Name must be at least 3 characters';
    }

    // Email Validation
    if (!email || email.trim() === '') {
        errors.email = 'Email is required';
    } else if (!validateEmail(email)) {
        errors.email = 'Please enter a valid email';
    }

    // Message Validation
    if (!message || message.trim() === '') {
        errors.message = 'Message is required';
    } else if (message.trim().length < 10) {
        errors.message = 'Message must be at least 10 characters';
    }

    return errors;
};

const clearErrors = () => {
    const errorElements = document.querySelectorAll('.error-message');
    errorElements.forEach(el => {
        el.textContent = '';
    });

    const inputs = document.querySelectorAll('.form-group input, .form-group textarea');
    inputs.forEach(input => {
        input.classList.remove('error');
    });
};

const displayErrors = (errors) => {
    clearErrors();

    if (errors.name) {
        document.getElementById('nameError').textContent = errors.name;
        document.getElementById('name').classList.add('error');
    }

    if (errors.email) {
        document.getElementById('emailError').textContent = errors.email;
        document.getElementById('email').classList.add('error');
    }

    if (errors.message) {
        document.getElementById('messageError').textContent = errors.message;
        document.getElementById('message').classList.add('error');
    }
};

// Contact Form Submit Handler
document.addEventListener('DOMContentLoaded', () => {
    const contactForm = document.getElementById('contactForm');

    if (contactForm) {
        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;

            // Validate
            const errors = validateForm(name, email, message);

            if (Object.keys(errors).length > 0) {
                displayErrors(errors);
                return;
            }

            // If validation passes, submit via AJAX
            try {
                const response = await fetch('/api/submit-contact.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: `name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&message=${encodeURIComponent(message)}`
                });

                const result = await response.json();

                if (result.success) {
                    clearErrors();
                    contactForm.reset();
                    document.getElementById('successMessage').style.display = 'block';
                    setTimeout(() => {
                        document.getElementById('successMessage').style.display = 'none';
                    }, 3000);
                } else {
                    alert('Error sending message: ' + result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while sending the message');
            }
        });
    }
});
