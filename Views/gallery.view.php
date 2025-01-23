<?php require 'partials/head.php'; ?>
<?php require 'partials/nav.php'; ?>

<div class="container mx-auto px-4 py-16 bg-gray-100">
    <h2 class="text-4xl font-bold text-center text-green-600 mb-6">Explore Our Retreat</h2>
    <p class="text-center text-gray-600 mb-12">Discover the beauty and serenity of our countryside getaway through photos and videos.</p>
    
    <!-- Image Gallery -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <!-- Replace these with dynamic images as needed -->
        <div><img src="<?php echo $storagePath; ?>/images/activity.jpg" alt="Scenic View" class="rounded-lg shadow-md"></div>
        <div><img src="<?php echo $storagePath; ?>/images/activity.jpg" alt="Cozy Cabin" class="rounded-lg shadow-md"></div>
        <div><img src="<?php echo $storagePath; ?>/images/activity.jpg" alt="Outdoor Activities" class="rounded-lg shadow-md"></div>
        <div><img src="<?php echo $storagePath; ?>/images/activity.jpg" alt="Countryside Trail" class="rounded-lg shadow-md"></div>
        <!-- Add more images dynamically -->
    </div>

    <!-- Video Section -->
    <!-- <div class="mt-16">
        <h3 class="text-3xl font-semibold text-center text-green-600 mb-6">Watch Our Videos</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <div class="aspect-w-16 aspect-h-9">
                <iframe class="rounded-lg shadow-md" src="https://www.youtube.com/embed/your-video-id" allowfullscreen></iframe>
            </div>

            <div class="aspect-w-16 aspect-h-9">
                <iframe class="rounded-lg shadow-md" src="https://www.instagram.com/p/your-post-id/embed" allowfullscreen></iframe>
            </div>

        </div>
    </div> -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto">
            <h2 class="text-4xl font-bold text-center text-green-600 mb-10">Watch Our Videos</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <!-- YouTube -->
                <div class="bg-white shadow-md p-6 rounded-lg text-center border-t-4 border-red-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="text-red-500 text-5xl mb-4">
                        <i class="fab fa-youtube"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">YouTube Channel</h3>
                    <p class="text-gray-600 mb-4">Check out our latest videos on YouTube for a closer look at our retreat.</p>
                    <a href="https://www.youtube.com/yourchannel" class="bg-red-500 text-white px-4 py-2 rounded-lg text-sm font-medium shadow-md hover:bg-red-600 transition">
                        Visit YouTube
                    </a>
                </div>

                <!-- Instagram -->
                <div class="bg-white shadow-md p-6 rounded-lg text-center border-t-4 border-pink-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="text-pink-500 text-5xl mb-4">
                        <i class="fab fa-instagram"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Instagram Reels</h3>
                    <p class="text-gray-600 mb-4">Follow our Instagram page for reels and sneak peeks of our countryside bliss.</p>
                    <a href="https://www.instagram.com/yourusername" class="bg-pink-500 text-white px-4 py-2 rounded-lg text-sm font-medium shadow-md hover:bg-pink-600 transition">
                        Visit Instagram
                    </a>
                </div>

                <!-- Add More Video Sources -->
                <!-- Example: Vimeo -->
                <div class="bg-white shadow-md p-6 rounded-lg text-center border-t-4 border-blue-500 hover:shadow-lg transition-shadow duration-300">
                    <div class="text-blue-500 text-5xl mb-4">
                        <i class="fab fa-vimeo"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Vimeo Showcase</h3>
                    <p class="text-gray-600 mb-4">Browse our curated videos and stories on Vimeo.</p>
                    <a href="https://vimeo.com/yourprofile" class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm font-medium shadow-md hover:bg-blue-600 transition">
                        Visit Vimeo
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>


<?php include 'partials/footer.php'; ?>
