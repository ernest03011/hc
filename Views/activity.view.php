<?php require 'partials/head.php'; ?>
<?php require 'partials/nav.php'; ?>

<section class="activities bg-gray-50 py-16 px-8" id="activities">
    <div class="container mx-auto">
        <h2 class="text-center text-4xl font-bold mb-12 text-green-600">What You Can Enjoy</h2>
        <div class="activity-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Nature Trails -->
            <div class="activity-card bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6 text-center border-t-4 border-green-500">
                <img src="<?php echo $storagePath; ?>/images/activity.jpg" alt="Nature Trails" class="w-full h-56 object-cover rounded-lg mb-4">
                <h3 class="mb-4 text-2xl font-semibold text-gray-800">Nature Trails</h3>
                <p class="text-gray-600">Hike through our scenic trails and discover hidden ponds, wildflower fields, and gentle streams.</p>
            </div>

            <!-- Farm-to-Table Meals -->
            <div class="activity-card bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6 text-center border-t-4 border-green-500">
                <img src="<?php echo $storagePath; ?>/images/activity.jpg" alt="Farm-to-Table Meals" class="w-full h-56 object-cover rounded-lg mb-4">
                <h3 class="mb-4 text-2xl font-semibold text-gray-800">Farm-to-Table Meals</h3>
                <p class="text-gray-600">Relish fresh produce straight from our gardens. Enjoy healthy, farm-to-table dining experiences.</p>
            </div>

            <!-- Outdoor Yoga -->
            <div class="activity-card bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 p-6 text-center border-t-4 border-green-500">
                <img src="<?php echo $storagePath; ?>/images/activity.jpg" alt="Outdoor Yoga" class="w-full h-56 object-cover rounded-lg mb-4">
                <h3 class="mb-4 text-2xl font-semibold text-gray-800">Outdoor Yoga</h3>
                <p class="text-gray-600">Relax and unwind with guided yoga sessions in the open air, surrounded by calm and silence.</p>
            </div>
        </div>
    </div>
</section>


<?php include 'partials/footer.php'; ?>