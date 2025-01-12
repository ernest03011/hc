<?php require 'partials/head.php'; ?>
<?php require 'partials/nav.php'; ?>


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

<?php include 'partials/footer.php'; ?>