<?php require __DIR__ . '/../partials/head.php'; ?>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<section class="bg-gray-50 text-gray-800 py-16">
    <div class="container mx-auto text-center">
        <div class="mb-8">
            <!-- Countryside-themed Icon -->
            <i class="fas fa-tractor text-green-600 text-6xl"></i>
        </div>
        <h1 class="text-5xl font-bold text-green-600 mb-6">422 - Unprocessable Entity</h1>
        <p class="text-lg text-gray-600">
            Oops! It seems we’ve hit a bump in the countryside trail.
        </p>
        <p class="mt-4 text-gray-600">
            We couldn’t process your request. This might be because of incomplete information or an unexpected issue. Please check your input or try again.
        </p>
        <p class="mt-8 text-gray-600">
            If the problem persists, feel free to <a href="/contact" class="text-green-600 font-semibold hover:underline">contact us</a> for assistance.
        </p>
        <div class="mt-10">
            <a href="/home" class="inline-block bg-green-600 text-white px-6 py-3 rounded-md text-lg font-semibold shadow-md hover:bg-green-700 transition">
                Return to Home
            </a>
        </div>
    </div>
</section>


<?php require __DIR__ . '/../partials/footer.php'; ?>