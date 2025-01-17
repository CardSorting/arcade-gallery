document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('store-listing-form');
    const iconInput = document.getElementById('icon');
    const errorContainer = document.getElementById('validation-errors');

    if (!form) return;

    // Image aspect ratio validation
    iconInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const img = new Image();
            img.src = URL.createObjectURL(file);
            
            img.onload = function() {
                if (img.width !== img.height) {
                    showError('App icon must be square (1:1 aspect ratio)');
                    iconInput.value = ''; // Clear invalid selection
                } else {
                    clearError();
                }
            };
        }
    });

    form.addEventListener('submit', function(e) {
        const description = document.getElementById('description');
        const minLength = 100;
        
        if (description.value.length < minLength) {
            e.preventDefault();
            showError(`Description must be at least ${minLength} characters`);
        }
    });

    function showError(message) {
        if (!errorContainer) return;
        errorContainer.textContent = message;
        errorContainer.classList.remove('hidden');
    }

    function clearError() {
        if (!errorContainer) return;
        errorContainer.textContent = '';
        errorContainer.classList.add('hidden');
    }
});
