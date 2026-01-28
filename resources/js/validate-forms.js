// Simple client-side form validation helpers

function showError(input, message) {
    const name = input.name;
    const el = document.querySelector(`[data-error-for="${name}"]`);
    if (el) {
        el.textContent = message;
        el.style.display = 'block';
    }
}

function clearError(input) {
    const name = input.name;
    const el = document.querySelector(`[data-error-for="${name}"]`);
    if (el) {
        el.textContent = '';
        el.style.display = 'none';
    }
}

function validateForm(form) {
    let valid = true;
    const inputs = form.querySelectorAll('input, textarea, select');
    inputs.forEach(input => {
        clearError(input);
        if (input.hasAttribute('required') && !input.value.trim()) {
            showError(input, 'This field is required.');
            valid = false;
            return;
        }
        const max = input.getAttribute('maxlength');
        if (max && input.value && input.value.length > parseInt(max, 10)) {
            showError(input, `Must be at most ${max} characters.`);
            valid = false;
            return;
        }
    });
    return valid;
}

function attachValidation() {
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', (e) => {
            // Only validate forms that look like project/task forms (basic heuristic)
            if (form.querySelector('[name="name"]') || form.querySelector('[name="title"]')) {
                if (!validateForm(form)) {
                    e.preventDefault();
                    e.stopPropagation();
                }
            }
        });

        form.querySelectorAll('input, textarea, select').forEach(input => {
            input.addEventListener('input', () => clearError(input));
        });
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', attachValidation);
} else {
    attachValidation();
}
