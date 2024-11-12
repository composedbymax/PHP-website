<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Spectrum Picker</title>
    <link rel="stylesheet" href="/css/projects/color-picker.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/nav.php'; ?>
    <div class="container">
        <div class="picker-container">
            <canvas id="colorPicker"></canvas>
            <div class="cursor" id="pickerCursor"></div>
        </div>
        <div style="position: relative;">  <!-- Added position relative -->
            <canvas id="colorSlider"></canvas>
            <div class="slider-cursor" id="sliderCursor"></div>
        </div>
        <div class="color-info">
            <div class="color-preview" id="preview"></div>
            <div class="color-values">
                <div class="color-value">
                    <span>HEX</span>
                    <span id="hexValue">#000000</span>
                </div>
                <div class="color-value">
                    <span>RGB</span>
                    <span id="rgbValue">0, 0, 0</span>
                </div>
                <div class="color-value">
                    <span>HSL</span>
                    <span id="hslValue">0°, 0%, 0%</span>
                </div>
            </div>
        </div>
    </div>

    <script src="/js/projects/color-picker.js" defer></script>
</body>
</html>
