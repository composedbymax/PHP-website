<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="some UI designs I made that I find visually appealing/engaging">
    <title>Max | Web Previews</title>
    <link rel="stylesheet" href="/css/root.css">
    <link rel="stylesheet" href="/css/web-design.css">
    
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/nav.php'; ?>
    <div class="container">
        <h1>Website Design Portfolio</h1>
        <div class="gallery">
            <!-- Sample Card -->
            <a href="/pages/simplicity" class="card">
                <div class="card-image-container">
                    <img src="/img/pages/1.jpeg" alt="Project 1" class="card-image">
                    <div class="shimmer-overlay"></div>
                </div>
                <div class="card-description">
                    <h3 class="card-title">Simplicity</h3>
                    <p class="card-text">Description</p>
                </div>
            </a>

            <a href="/pages/sphere" class="card">
                <div class="card-image-container">
                    <img src="/img/pages/1.jpeg" alt="Project 1" class="card-image">
                    <div class="shimmer-overlay"></div>
                </div>
                <div class="card-description">
                    <h3 class="card-title">sphere</h3>
                    <p class="card-text">Description</p>
                </div>
            </a>

            <a href="/pages/svg" class="card">
                <div class="card-image-container">
                    <img src="/img/pages/1.jpeg" alt="Project 1" class="card-image">
                    <div class="shimmer-overlay"></div>
                </div>
                <div class="card-description">
                    <h3 class="card-title">svg</h3>
                    <p class="card-text">Description</p>
                </div>
            </a>

            <a href="/pages/svg2" class="card">
                <div class="card-image-container">
                    <img src="/img/pages/1.jpeg" alt="Project 1" class="card-image">
                    <div class="shimmer-overlay"></div>
                </div>
                <div class="card-description">
                    <h3 class="card-title">svg 2</h3>
                    <p class="card-text">Description</p>
                </div>
            </a>
        </div>
    </div>

    <script src="/js/web-design.js" defer></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/foot.php'; ?>
</body>
</html>
