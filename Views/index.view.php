<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>

<!-- Hero Section -->
<section class="hero" id="hero">
    <div class="hero-content">
        <h1>Escape to the Green</h1>
        <p>Discover our cozy retreat nestled in the heart of the countryside. Enjoy fresh air, open fields, and a peaceful getaway from the city hustle.</p>
        <a href="/contact">Book Your Stay</a>
    </div>
</section>

<!-- Carousel Section -->
<section class="carousel-section" id="carousel-section">
    <div class="carousel">
        <button class="carousel-button prev">&#8249;</button>
        <div class="carousel-container">
            <div class="carousel-slide"><img src="<?php echo $storagePath; ?>/images/carousel.jpg" alt="View 1"></div>
            <div class="carousel-slide"><img src="<?php echo $storagePath; ?>/images/carousel.jpg" alt="View 2"></div>
            <div class="carousel-slide"><img src="<?php echo $storagePath; ?>/images/carousel.jpg" alt="View 3"></div>
        </div>
        <button class="carousel-button next">&#8250;</button>
    </div>
</section>

<!-- Activities Section -->
<section class="activities" id="activities">
    <h2>What You Can Enjoy</h2>
    <div class="activity-grid">
        <div class="activity-card">
            <img src="<?php echo $storagePath; ?>/images/activity.jpg" alt="Activity 1">
            <h3>Nature Trails</h3>
            <p>Hike through our scenic trails and discover hidden ponds, wildflower fields, and gentle streams.</p>
        </div>
        <div class="activity-card">
            <img src="<?php echo $storagePath; ?>/images/activity.jpg" alt="Activity 2">
            <h3>Farm-to-Table Meals</h3>
            <p>Relish fresh produce straight from our gardens. Enjoy healthy, farm-to-table dining experiences.</p>
        </div>
        <div class="activity-card">
            <img src="<?php echo $storagePath; ?>/images/activity.jpg" alt="Activity 3">
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
            <a href="<?php echo $ig ?>" target="_blank">Instagram</a>
            <a href="<?php echo $airbnb ?>" target="_blank">Airbnb Listing</a>
        </div>
    </div>
    <div class="contact-form-wrapper">
        <form id="contactForm" action="/contact" method="POST">
            <input type="text" name="name" placeholder="Your Name*" required>
            <input type="email" name="email" placeholder="Your Email*" required>
            <textarea name="message" rows="5" placeholder="Your Message*" required></textarea>

            <input type="hidden" name="submit_frm" value="1">
            <input type="hidden" id="recaptchaToken" name="recaptchaToken" />

            <button 
                data-action="submit" 
                class="g-recaptcha mt-6 bg-yellow-950 text-white p-2 rounded-md"
                data-sitekey="6LcbNzkpAAAAAPvT5x0b_m25lwwG9tKZfXqt5lbE"
                id="submitButton"
            >
                Send Message

            </button>
        </form>
    </div>
</section>

<?php require('partials/footer.php') ?>