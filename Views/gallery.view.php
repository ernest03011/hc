<?php require 'partials/head.php'; ?>
<?php require 'partials/nav.php'; ?>

<section class="page-banner">
    <h1>Gallery</h1>
</section>

<div class="container">
    <h2>Explore Our Retreat</h2>
    <p>A glimpse of what awaits you.</p>
    <div class="carousel-section">
        <!-- Add your carousel images here -->
        <div class="carousel">
            <button class="carousel-button prev">&#8249;</button>
            <div class="carousel-container">
                <div class="carousel-slide"><img src="<?php echo $storagePath; ?>/images/carousel.jpg" alt="View 1"></div>
                <div class="carousel-slide"><img src="<?php echo $storagePath; ?>/images/carousel.jpg" alt="View 2"></div>
                <div class="carousel-slide"><img src="<?php echo $storagePath; ?>/images/carousel.jpg" alt="View 3"></div>
            </div>
            <button class="carousel-button next">&#8250;</button>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>
