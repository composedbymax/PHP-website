<!DOCTYPE html>
<html>
<head>
    <title>Online Code Editor / Preview</title>
    <link rel="stylesheet" href="/css/projects/code-preview.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/nav.php'; ?>
    <div class="editors">
        <div>
            <h3>HTML</h3>
            <textarea id="html"></textarea>
        </div>
        <div>
            <h3>CSS</h3>
            <textarea id="css"></textarea>
        </div>
        <div>
            <h3>JavaScript</h3>
            <textarea id="js"></textarea>
        </div>
    </div>
    
    <button onclick="runCode()">Run Code</button>
    <button onclick="downloadCombined()">Download Combined</button>
    
    <h3>Preview:</h3>
    <iframe id="preview"></iframe>

    <script src="/js/projects/code-preview.js" defer></script>
</body>
</html>
