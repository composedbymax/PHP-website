<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layered Image Effects Editor</title>
    <link rel="stylesheet" href="/css/projects/image-effects.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/nav.php'; ?>
    <div class="container">
        <div class="left-panel">
            <h2>Effects</h2>
            <div class="effects-section">
                <button class="effect-button" onclick="addEffectLayer('pixelate')" disabled id="pixelateBtn">Pixelate</button>
                <button class="effect-button" onclick="addEffectLayer('glitch')" disabled id="glitchBtn">Glitch</button>
                <button class="effect-button" onclick="addEffectLayer('wavey')" disabled id="waveyBtn">Wavey</button>
                <button class="effect-button" onclick="addEffectLayer('invert')" disabled id="invertBtn">Invert</button>
                <button class="effect-button" onclick="addEffectLayer('blur')" disabled id="blurBtn">Blur</button>
                <button class="effect-button" onclick="addEffectLayer('noise')" disabled id="noiseBtn">Noise</button>
                <button class="effect-button" onclick="addEffectLayer('chromatic')" disabled id="chromaticBtn">Chromatic</button>
                <button class="effect-button" onclick="addEffectLayer('vignette')" disabled id="vignetteBtn">Vignette</button>
                <button class="effect-button" onclick="addEffectLayer('scanlines')" disabled id="scanlinesBtn">Scanlines</button>
                <button class="effect-button" onclick="addEffectLayer('rgb-shift')" disabled id="rgbShiftBtn">RGB Shift</button>
            </div>

            <div class="layers-panel">
                <h3>Layers</h3>
                <div id="layersList"></div>
            </div>

            <div class="download-section">
                <button onclick="downloadImage()" disabled id="downloadBtn">Download Image</button>
                <button onclick="resetAll()" disabled id="resetBtn">Reset All</button>
            </div>
        </div>

        <div class="right-panel">
            <div class="upload-section" id="dropZone">
                <input type="file" id="fileInput" accept="image/*" style="display: none;">
                <button onclick="document.getElementById('fileInput').click()">Upload Image</button>
                <p>or drag and drop an image here</p>
            </div>

            <div class="canvas-container">
                <canvas id="canvas"></canvas>
            </div>
        </div>
    </div>

    <script src="/js/projects/image-effects.js" defer></script>
</body>
</html>