<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Short time fourier transform animation controlled by live audio or inputted audio files">
    <title>Max | STFT Analyzer</title>
    <link rel="stylesheet" href="/css/projects/short-time-fourier-transform.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/nav.php'; ?>
    <div id="container">
        <div id="visualizer"></div>
        <div id="controls">
            <input type="file" id="upload" accept="audio/*" />
            <button id="toggleMic">Enable Mic</button>
            <button id="playPause">Play/Pause</button>
            <label for="sensitivity">Sensitivity</label>
            <input type="range" id="sensitivity" min="1" max="5" step="0.1" value="1">
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="/js/projects/short-time-fourier-transform.js" defer></script>
</body>
</html>