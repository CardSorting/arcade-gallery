document.addEventListener('alpine:init', () => {
    Alpine.data('screenshotModal', () => ({
        open: false,
        imageSrc: '',
        showImage(src) {
            this.imageSrc = src;
            this.open = true;
        }
    }))
})
