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

<script>
    const prevBtn = document.querySelector('.carousel-button.prev');
    const nextBtn = document.querySelector('.carousel-button.next');
    const carouselContainer = document.querySelector('.carousel-container');
    const slides = document.querySelectorAll('.carousel-slide');

    let currentSlide = 0;
    const totalSlides = slides.length;

    function showSlide(index) {
        if (index < 0) currentSlide = totalSlides - 1;
        else if (index >= totalSlides) currentSlide = 0;
        else currentSlide = index;
        carouselContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
    }

    prevBtn.addEventListener('click', () => {
        showSlide(currentSlide - 1);
    });

    nextBtn.addEventListener('click', () => {
        showSlide(currentSlide + 1);
    });

    // Auto-play (optional)
    setInterval(() => {
        showSlide(currentSlide + 1);
    }, 5000);
</script>


<?php include 'partials/footer.php'; ?>
