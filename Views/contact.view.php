<?php require 'partials/head.php'; ?>
<?php require 'partials/nav.php'; ?>

<section class="page-banner">
    <h1>Contact Us</h1>
</section>

<?php
    if(!empty($messageType))
    {
        $notificationClass = $messageType === 'success' ? 'notification success' : 'notification error';
    }
?>

<?php if (!empty($message)) : ?>
  <section>
    <p class="<?= $notificationClass; ?>">
      <?= htmlspecialchars($message) ?>
    </p>
  </section>
<?php endif; ?>



<div class="container">
    <h2>Get in Touch</h2>
    <p>Questions, inquiries, or reservations? We’re here to help.</p>
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
            <input type="hidden" value="Countless moments in Paradise." name="subject" id="subject">
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
</div>

<?php include 'partials/footer.php'; ?>
