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
        const screenshots = document.getElementById('screenshots');
        const icon = document.getElementById('icon');
        let hasErrors = false;
        
        // Clear previous errors
        clearError();

        // Validate description length
        if (description.value.length < minLength) {
            showError(`Description must be at least ${minLength} characters`);
            hasErrors = true;
        }
        
        // Validate icon
        if (icon.files.length > 0) {
            const allowedTypes = ['image/jpeg', 'image/png'];
            const maxSize = 2 * 1024 * 1024; // 2MB
            const file = icon.files[0];
            
            // Check file type
            if (!allowedTypes.includes(file.type)) {
                showError('App icon must be JPEG or PNG');
                hasErrors = true;
            }
            
            // Check file size
            if (file.size > maxSize) {
                showError('App icon must be smaller than 2MB');
                hasErrors = true;
            }
        }

        // Validate screenshots if any are selected
        if (screenshots.files.length > 0) {
            const allowedTypes = ['image/jpeg', 'image/png'];
            const maxSize = 2 * 1024 * 1024; // 2MB
            const maxCount = 5;
            
            // Check number of screenshots
            if (screenshots.files.length > maxCount) {
                showError(`You can upload a maximum of ${maxCount} screenshots`);
                hasErrors = true;
            }
            
            for (let i = 0; i < screenshots.files.length; i++) {
                const file = screenshots.files[i];
                
                // Check file type
                if (!allowedTypes.includes(file.type)) {
                    showError('Screenshots must be JPEG or PNG files');
                    hasErrors = true;
                    break;
                }
                
                // Check file size
                if (file.size > maxSize) {
                    showError('Each screenshot must be smaller than 2MB');
                    hasErrors = true;
                    break;
                }
            }
        }

        // Prevent form submission if there are errors
        if (hasErrors) {
            e.preventDefault();
        } else {
            // Show loading state
            const submitButton = form.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.innerHTML = 'Submitting...';
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

// Share functionality
function shareListing(listingId) {
    fetch(`/store-listings/${listingId}/share`, {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.url) {
            navigator.clipboard.writeText(data.url)
                .then(() => {
                    alert('Share link copied to clipboard!');
                })
                .catch(() => {
                    alert('Failed to copy link to clipboard');
                });
        } else {
            alert('Failed to generate share link');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Failed to generate share link');
    });
}
