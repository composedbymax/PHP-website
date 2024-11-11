<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <html lang="en">
    <meta charset="UTF-8">
    <meta name="description" content="upload an image - convert it by X axis Y axis or both - then proceed to download. this has been useful for building simple 3D textures">
    <title>Max | Image Symmetry Processor</title>
    <link rel="stylesheet" href="/css/projects/image-symmetry-processor.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/nav.php'; ?>
    <div class="container">
        <h1>Image Symmetry Processor</h1>
        <div id="drop-zone">
            <label id="upload-label" for="upload">Drag & Drop or Click to Upload</label>
            <input type="file" id="upload" accept="image/*">
        </div>
        <div id="image-container">
            <canvas id="canvas"></canvas>
        </div>
        <div class="button-group">
            <button id="quad-symmetry">Quad Symmetry</button>
            <button id="x-symmetry">X-Axis Symmetry</button>
            <button id="y-symmetry">Y-Axis Symmetry</button>
        </div>
        <button id="download-btn" style="display:none; margin-top: 20px; background-color: var(--neon-blue);">
            Download Image
        </button>
    </div>
    <script src="/js/projects/image-symmetry-processor.js" defer></script>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/foot.php'; ?>
</body>
</html>