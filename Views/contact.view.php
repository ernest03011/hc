<?php require 'partials/head.php'; ?>
<?php require 'partials/nav.php'; ?>

<?php 
if (!empty($messageType)) {
    $notificationClass = $messageType === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white';
}
?>

<?php if (!empty($message)) : ?>
<section class="mb-8">
    <p class="p-4 rounded-md <?= $notificationClass; ?> text-center font-semibold">
        <?= htmlspecialchars($message); ?>
    </p>
</section>
<?php endif; ?>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-8">
        <h2 class="text-4xl font-bold text-center text-green-600 mb-6">Get in Touch</h2>
        <p class="text-gray-700 text-center mb-10">Questions, inquiries, or reservations? We're here to help.</p>
        
        <!-- Social Links -->
        <div class="flex justify-center gap-8 mb-12">
            <a href="<?= $ig ?>" target="_blank" class="flex items-center gap-2 text-gray-700 hover:text-pink-500">
                <i class="fab fa-instagram text-2xl"></i>
                <span class="text-lg font-semibold">Instagram</span>
            </a>
            <a href="<?= $airbnb ?>" target="_blank" class="flex items-center gap-2 text-gray-700 hover:text-red-500">
                <i class="fas fa-home text-2xl"></i>
                <span class="text-lg font-semibold">Airbnb Listing</span>
            </a>
        </div>

        <!-- Contact Form -->
        <div class="max-w-lg mx-auto bg-white shadow-md p-8 rounded-lg">
            <form id="contactForm" action="/contact" method="POST" class="flex flex-col gap-6">
                <input 
                    type="text" 
                    name="name" 
                    placeholder="Your Name*" 
                    required 
                    class="p-4 rounded-md border border-gray-300 text-gray-800 focus:ring-2 focus:ring-green-500"
                >
                <input 
                    type="email" 
                    name="email" 
                    placeholder="Your Email*" 
                    required 
                    class="p-4 rounded-md border border-gray-300 text-gray-800 focus:ring-2 focus:ring-green-500"
                >
                <textarea 
                    name="message" 
                    rows="5" 
                    placeholder="Your Message*" 
                    required 
                    class="p-4 rounded-md border border-gray-300 text-gray-800 focus:ring-2 focus:ring-green-500"
                ></textarea>

                <input type="hidden" name="submit_frm" value="1">
                <input type="hidden" id="recaptchaToken" name="recaptchaToken" />

                <button 
                    class="mt-4 bg-green-600 text-white py-3 px-6 rounded-md hover:bg-green-700 font-semibold shadow-lg transition"
                    id="submitButton"
                    data-sitekey="6LcbNzkpAAAAAPvT5x0b_m25lwwG9tKZfXqt5lbE"
                    data-action="submit"
                >
                    Send Message
                </button>
            </form>
        </div>
    </div>
</section>


<?php include 'partials/footer.php'; ?>
