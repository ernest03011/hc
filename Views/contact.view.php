<?php require 'partials/head.php'; ?>
<?php require 'partials/nav.php'; ?>

<section class="page-banner">
    <h1>Contact Us</h1>
</section>

<?php if(! empty($message)) : ?>

  <section>
    <h3>This is the the <?= $message ?></h1>
  </section>

<?php endif; ?>


<div class="container">
    <h2>Get in Touch</h2>
    <p>Questions, inquiries, or reservations? We’re here to help.</p>
    <div class="contact-details">
        <div class="social-links">
            <a href="https://www.instagram.com/yourinsta" target="_blank">Instagram</a>
            <a href="https://www.airbnb.com/rooms/yourlisting" target="_blank">Airbnb Listing</a>
        </div>
    </div>
    <div class="contact-form-wrapper">
        <form action="/contact" method="POST">
            <input type="text" name="name" placeholder="Your Name*" required>
            <input type="email" name="email" placeholder="Your Email*" required>
            <textarea name="message" rows="5" placeholder="Your Message*" required></textarea>
            <div class="g-recaptcha" data-sitekey="your_site_key"></div>
            <button type="submit">Send Message</button>
        </form>
    </div>
</div>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php include 'partials/footer.php'; ?>
