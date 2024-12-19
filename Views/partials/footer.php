    <footer>
        &copy; 2024 Countryside Stay. All rights reserved.
    </footer>

    <!-- reCAPTCHA script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Carousel JS -->
    <script>
        const prevBtn = document.querySelector('.carousel-button.prev');
        const nextBtn = document.querySelector('.carousel-button.next');
        const carouselContainer = document.querySelector('.carousel-container');
        const slides = document.querySelectorAll('.carousel-slide');

        let currentSlide = 0;
        const totalSlides = slides.length;

        function showSlide(index) {
            if (index < 0) currentSlide = totalSlides - 1;
            else if (index >= totalSlides) currentSlide = 0;
            else currentSlide = index;
            carouselContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
        }

        prevBtn.addEventListener('click', () => {
            showSlide(currentSlide - 1);
        });

        nextBtn.addEventListener('click', () => {
            showSlide(currentSlide + 1);
        });

        // Auto-play (optional)
        setInterval(() => {
            showSlide(currentSlide + 1);
        }, 5000);
    </script>
</body>
</html>