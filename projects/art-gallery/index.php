<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="find yourself in an immersive 3D art gallery with notable works to view on either side. mobile compatibility and multiple galleries coming soon">
    <title>Max | 3D Art Gallery</title>
    <link rel="stylesheet" href="/css/projects/art-gallery.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/nav.php'; ?>
    <div id="instructions">
        Use UP/DOWN arrows to move forward/backward<br>
        Use mouse to look around
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="/js/projects/art-gallery.js" defer></script>
</body>
</html>
