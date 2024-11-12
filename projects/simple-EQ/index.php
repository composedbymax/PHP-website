<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Audio Frequency Analyzer</title>
    <link rel="stylesheet" href="/css/projects/simple-EQ.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/nav.php'; ?>
    <div class="container">
        <div id="dropzone" class="dropzone">
            <p>Drop audio file here or click to select</p>
            <input type="file" id="audioFile" accept="audio/*" style="display: none">
        </div>

        <audio id="audioElement" controls></audio>

        <div class="controls">
            <button id="startBtn">Start Analysis</button>
            <button id="pauseBtn">Pause</button>
        </div>

        <div class="visualizer-container">
            <canvas id="analyzer"></canvas>
            
            <div class="eq-zones">
                <div class="eq-zone" style="color: #ff7f7f">Sub Bass<br>20-60 Hz</div>
                <div class="eq-zone" style="color: #ffbf7f">Bass<br>60-250 Hz</div>
                <div class="eq-zone" style="color: #ffff7f">Low Mid<br>250-500 Hz</div>
                <div class="eq-zone" style="color: #7fff7f">Mid<br>500-2k Hz</div>
                <div class="eq-zone" style="color: #7fbfff">Upper Mid<br>2k-4k Hz</div>
                <div class="eq-zone" style="color: #7f7fff">Presence<br>4k-6k Hz</div>
                <div class="eq-zone" style="color: #ff7fff">Brilliance<br>6k-20k Hz</div>
            </div>
        </div>
    </div>

    <script src="/js/projects/simple-EQ.js" defer></script>
</body>
</html>