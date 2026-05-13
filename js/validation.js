/**
 * Contact Form Validation & Submission
 */

const validateEmail = email => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

const t = key => typeof i18n !== 'undefined' ? i18n.t(key) : key;

const validateForm = (name, email, message) => {
    const errors = {};

    if (!name.trim()) {
        errors.name = t('contact.form.error.required');
    } else if (name.trim().length < 3) {
        errors.name = t('contact.form.error.nameLength') || 'Name must be at least 3 characters';
    }

    if (!email.trim()) {
        errors.email = t('contact.form.error.required');
    } else if (!validateEmail(email)) {
        errors.email = t('contact.form.error.email');
    }

    if (!message.trim()) {
        errors.message = t('contact.form.error.required');
    } else if (message.trim().length < 10) {
        errors.message = t('contact.form.error.messageLength') || 'Message must be at least 10 characters';
    }

    return errors;
};

const clearErrors = () => {
    document.querySelectorAll('.error-message').forEach(el => { el.textContent = ''; });
    document.querySelectorAll('.form-group input, .form-group textarea').forEach(el => {
        el.classList.remove('error');
    });
};

const displayErrors = errors => {
    clearErrors();
    for (const [field, msg] of Object.entries(errors)) {
        const errorEl = document.getElementById(`${field}Error`);
        const inputEl = document.getElementById(field);
        if (errorEl) errorEl.textContent = msg;
        if (inputEl) inputEl.classList.add('error');
    }
};

document.addEventListener('DOMContentLoaded', () => {
    const form         = document.getElementById('contactForm');
    const submitBtn    = form?.querySelector('button[type="submit"]');
    const successMsg   = document.getElementById('successMessage');

    if (!form) return;

    form.addEventListener('submit', async e => {
        e.preventDefault();

        const name    = document.getElementById('name').value;
        const email   = document.getElementById('email').value;
        const message = document.getElementById('message').value;
        const errors  = validateForm(name, email, message);

        if (Object.keys(errors).length > 0) {
            displayErrors(errors);
            return;
        }

        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.classList.add('is-loading');
            submitBtn.textContent = t('contact.form.sending');
        }

        try {
            const res  = await fetch('/api/submit-contact.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `name=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&message=${encodeURIComponent(message)}`
            });
            const data = await res.json();

            if (data.success) {
                clearErrors();
                form.reset();
                if (successMsg) {
                    successMsg.textContent = t('contact.form.success');
                    successMsg.style.display = 'block';
                    setTimeout(() => { successMsg.style.display = 'none'; }, 3000);
                }
            } else {
                alert('Error: ' + data.message);
            }
        } catch {
            alert(t('error') || 'An error occurred');
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.classList.remove('is-loading');
                submitBtn.textContent = t('contact.form.submit');
            }
        }
    });
});
