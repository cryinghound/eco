<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
<?php include 'navbar.php'; ?>
    <section class="slider">
        <div class="slides">
            <div class="slide active">
                <img src="media/sample1.jpg" alt="Slide Image 1">
                <div class="slide-content">
                    <h2>Basura</h2>
                    <p class="description">A brief description about this slide, highlighting the main idea.</p>
                </div>
            </div>
            <div class="slide">
                <img src="media/sample2.jpg" alt="Slide Image 2">
                <div class="slide-content">
                    <h2>Pagong</h2>
                    <p class="description">This slide provides insights into another topic.</p>
                </div>
            </div>
            <div class="slide">
                <img src="media/sample 3.jpg" alt="Slide Image 3">
                <div class="slide-content">
                    <h2>Recycle</h2>
                    <p class="description">Final slide showcasing another key highlight.</p>
                </div>
            </div>
        </div>
        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>
    </section>
    <script src="script.js" defer></script>
    <?php include 'footer.php'; ?>
</body>
</html>