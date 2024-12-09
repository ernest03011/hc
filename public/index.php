<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cozy Countryside Retreat</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <!-- Navigation -->
     
    <nav>
        <div class="logo">Countryside Stay</div>
        <ul>
            <li><a href="#hero">Home</a></li>
            <li><a href="#carousel-section">Gallery</a></li>
            <li><a href="#activities">Activities</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="hero">
        <div class="hero-content">
            <h1>Escape to the Green</h1>
            <p>Discover our cozy retreat nestled in the heart of the countryside. Enjoy fresh air, open fields, and a peaceful getaway from the city hustle.</p>
            <a href="#contact">Book Your Stay</a>
        </div>
    </section>

    <!-- Carousel Section -->
    <section class="carousel-section" id="carousel-section">
        <div class="carousel">
            <button class="carousel-button prev">&#8249;</button>
            <div class="carousel-container">
                <div class="carousel-slide"><img src="./images/carousel.jpg" alt="View 1"></div>
                <div class="carousel-slide"><img src="./images/carousel.jpg" alt="View 2"></div>
                <div class="carousel-slide"><img src="./images/carousel.jpg" alt="View 3"></div>
            </div>
            <button class="carousel-button next">&#8250;</button>
        </div>
    </section>

    <!-- Activities Section -->
    <section class="activities" id="activities">
        <h2>What You Can Enjoy</h2>
        <div class="activity-grid">
            <div class="activity-card">
                <img src="./images/activity.jpg" alt="Activity 1">
                <h3>Nature Trails</h3>
                <p>Hike through our scenic trails and discover hidden ponds, wildflower fields, and gentle streams.</p>
            </div>
            <div class="activity-card">
                <img src="./images/activity.jpg" alt="Activity 2">
                <h3>Farm-to-Table Meals</h3>
                <p>Relish fresh produce straight from our gardens. Enjoy healthy, farm-to-table dining experiences.</p>
            </div>
            <div class="activity-card">
                <img src="./images/activity.jpg" alt="Activity 3">
                <h3>Outdoor Yoga</h3>
                <p>Relax and unwind with guided yoga sessions in the open air, surrounded by calm and silence.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <h2>Get in Touch</h2>
        <div class="contact-details">
            <div class="social-links">
                <a href="https://www.instagram.com/yourinsta" target="_blank">Instagram</a>
                <a href="https://www.airbnb.com/rooms/yourlisting" target="_blank">Airbnb Listing</a>
            </div>
        </div>
        <div class="contact-form-wrapper">
            <form action="send_mail.php" method="POST">
                <input type="text" name="name" placeholder="Your Name*" required>
                <input type="email" name="email" placeholder="Your Email*" required>
                <textarea name="message" rows="5" placeholder="Your Message*" required></textarea>
                <div class="g-recaptcha" data-sitekey="your_site_key"></div>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>

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
