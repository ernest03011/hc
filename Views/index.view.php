<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>

<!-- Hero Section -->
<section 
    class="relative bg-cover bg-center h-screen" 
    style="background-image: url('<?php echo $storagePath; ?>/images/hero.jpg');"
>
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative container mx-auto h-full flex flex-col justify-center items-center text-center text-white">
        <h1 class="text-5xl md:text-6xl font-bold drop-shadow-lg">
            Welcome to Countryside Bliss
        </h1>
        <p class="mt-6 text-lg md:text-xl max-w-3xl drop-shadow-md">
            Escape to a serene countryside retreat. Enjoy cozy accommodations, scenic views, and a variety of outdoor activities designed for relaxation and adventure.
        </p>
        <div class="mt-8 flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6">
            <a href="/about" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-lg text-lg shadow-lg">
                Learn More
            </a>
            <a href="/contact" class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded-lg text-lg shadow-lg">
                Contact Us
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-6">What We Offer</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white shadow-md p-6 rounded-lg">
                <h3 class="text-2xl font-semibold">Cozy Accommodation</h3>
                <p class="mt-2 text-gray-600">Experience the comfort of our rustic yet modern cabins.</p>
            </div>
            <div class="bg-white shadow-md p-6 rounded-lg">
                <h3 class="text-2xl font-semibold">Scenic Views</h3>
                <p class="mt-2 text-gray-600">Enjoy breathtaking views of the countryside.</p>
            </div>
            <div class="bg-white shadow-md p-6 rounded-lg">
                <h3 class="text-2xl font-semibold">Outdoor Activities</h3>
                <p class="mt-2 text-gray-600">Explore hiking, fishing, and other activities nearby.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-6">How to Contact Us</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- WhatsApp -->
            <div class="bg-white shadow-md p-6 rounded-lg text-center">
                <div class="text-green-500 text-4xl mb-4">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <h3 class="text-2xl font-semibold">WhatsApp</h3>
                <p class="mt-2 text-gray-600">Chat with us directly on WhatsApp.</p>
                <a href="<?= $whatsapp ?>" target="_blank" class="text-green-500 font-semibold mt-4 inline-block">Start Chat</a>
            </div>

            <!-- Instagram -->
            <div class="bg-white shadow-md p-6 rounded-lg text-center">
                <div class="text-pink-500 text-4xl mb-4">
                    <i class="fab fa-instagram"></i>
                </div>
                <h3 class="text-2xl font-semibold">Instagram</h3>
                <p class="mt-2 text-gray-600">Follow us on Instagram for updates and photos.</p>
                <a href="<?= $ig ?>" target="_blank" class="text-pink-500 font-semibold mt-4 inline-block">Visit Instagram</a>
            </div>

            <!-- Airbnb -->
            <div class="bg-white shadow-md p-6 rounded-lg text-center">
                <div class="text-red-500 text-4xl mb-4">
                    <i class="fas fa-home"></i>
                </div>
                <h3 class="text-2xl font-semibold">Airbnb</h3>
                <p class="mt-2 text-gray-600">Book your stay with us on Airbnb.</p>
                <a href="<?= $airbnb ?>" target="_blank" class="text-red-500 font-semibold mt-4 inline-block">View Listing</a>
            </div>

            <!-- Email/Write -->
            <div class="bg-white shadow-md p-6 rounded-lg text-center">
                <div class="text-blue-500 text-4xl mb-4">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3 class="text-2xl font-semibold">Email/Write</h3>
                <p class="mt-2 text-gray-600">Send us a message directly through our website.</p>
                <a href="/contact" class="text-blue-500 font-semibold mt-4 inline-block">Write to Us</a>
            </div>
        </div>
    </div>
</section>



<?php require('partials/footer.php') ?>