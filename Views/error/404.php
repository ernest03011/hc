<?php require __DIR__ . '/../partials/head.php'; ?>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<section class="h-screen flex flex-col items-center justify-center bg-gray-50 text-gray-800">
    <div class="text-center">
        <!-- Countryside Icon -->
        <div class="mb-6">
            <i class="fas fa-hat-cowboy text-green-600 text-6xl"></i>
        </div>
        <!-- Main Message -->
        <h1 class="text-5xl font-bold text-green-600 mb-4">404 - Page Not Found</h1>
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Oh no! You seem to be off the beaten path.</h2>
        <p class="text-gray-600 mb-6">
            The page you're looking for doesn’t exist or may have been moved. It’s like losing your way in the countryside—don’t worry, we’ll help you find your way back!
        </p>
        <!-- Call to Action -->
        <div class="space-x-4">
            <a href="/" class="inline-block bg-green-600 text-white px-6 py-3 rounded-md text-lg font-semibold shadow-md hover:bg-green-700 transition">
                Return to Home
            </a>
            <a href="/contact" class="inline-block bg-gray-300 text-gray-800 px-6 py-3 rounded-md text-lg font-semibold shadow-md hover:bg-gray-400 transition">
                Contact Us
            </a>
        </div>
    </div>
</section>


<?php require __DIR__ . '/../partials/footer.php'; ?>
