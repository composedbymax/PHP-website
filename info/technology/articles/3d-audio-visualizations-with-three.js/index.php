<?php
$page_title = "3D Audio Visualizations with Three.js | AudioVerse";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Create immersive 3D audio visualizations using Three.js and WebGL">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="/css/info/style.css">
    <link rel="stylesheet" href="/css/info/page.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/nav.php'; ?>

    <main class="page-content">
        <article>
            <header class="article-header">
                <h1 class="article-title"><?php echo $page_title; ?></h1>
                <div class="article-meta">
                    <span class="date">October 29, 2024</span>
                    <span class="author">Author: Inteliuz</span>
                    <span class="difficulty-badge difficulty-intermediate">Intermediate</span>
                </div>
            </header>

            <div class="table-of-contents">
                <h3>Table of Contents</h3>
                <ul>
                    <li><a href="#introduction">Introduction to Three.js</a></li>
                    <li><a href="#setup">Setting Up Three.js</a></li>
                    <li><a href="#audio-integration">Integrating Audio Analysis</a></li>
                    <li><a href="#3d-visualization">Creating 3D Visualizations</a></li>
                    <li><a href="#interaction">Adding User Interaction</a></li>
                </ul>
            </div>

            <div class="article-content">
                <section id="introduction">
                    <h2>Introduction to Three.js</h2>
                    <p>Three.js is a powerful JavaScript library that simplifies creating and rendering 3D graphics in the browser. By integrating audio analysis, we can build immersive, interactive visualizations that react to sound, creating a unique experience for users.</p>
                    <p>In this tutorial, we’ll cover setting up Three.js, integrating audio, and designing a 3D visualization with user interactions.</p>
                </section>

                <section id="setup">
                    <h2>Setting Up Three.js</h2>
                    <p>Let’s begin by setting up a basic Three.js scene. Start by creating an HTML file and including the Three.js library:</p>
                    <pre><code>&lt;script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"&gt;&lt;/script&gt;</code></pre>
                    <p>Next, initialize the Three.js renderer, camera, and scene:</p>
                    <pre><code>const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth/window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

camera.position.z = 5;</code></pre>
                    <p>This setup provides the essential 3D space, a camera for viewing, and a renderer to display it in the browser.</p>
                </section>

                <section id="audio-integration">
                    <h2>Integrating Audio Analysis</h2>
                    <p>We’ll use the <code>Web Audio API</code> to analyze audio and create visual effects based on frequency data.</p>
                    <h3>Setting Up Audio Context</h3>
                    <p>To begin, create an <code>AudioContext</code> and set up an <code>AnalyserNode</code> to capture audio frequency data:</p>
                    <pre><code>const audioContext = new (window.AudioContext || window.webkitAudioContext)();
const analyser = audioContext.createAnalyser();
analyser.fftSize = 256;
const dataArray = new Uint8Array(analyser.frequencyBinCount);</code></pre>
                    <h3>Connecting Audio Source</h3>
                    <p>Connect an audio element to the analyser:</p>
                    <pre><code>const audio = new Audio('path/to/your-audio-file.mp3');
const source = audioContext.createMediaElementSource(audio);
source.connect(analyser);
analyser.connect(audioContext.destination);
audio.play();</code></pre>
                    <p>We now have audio data ready to power our visualization.</p>
                </section>

                <section id="3d-visualization">
                    <h2>Creating 3D Visualizations</h2>
                    <p>With the Three.js setup and audio analysis in place, let’s start visualizing data by creating responsive shapes.</p>
                    <h3>Adding 3D Objects</h3>
                    <p>We’ll create a group of cubes, each representing a frequency band from the audio data:</p>
                    <pre><code>const bars = [];
for (let i = 0; i < dataArray.length; i++) {
    const geometry = new THREE.BoxGeometry(0.5, 0.5, 0.5);
    const material = new THREE.MeshBasicMaterial({ color: 0x00ff00 });
    const bar = new THREE.Mesh(geometry, material);
    bar.position.x = (i - dataArray.length / 2) * 0.6;
    scene.add(bar);
    bars.push(bar);
}</code></pre>
                    <p>This code creates a series of cubes that can expand based on the audio data.</p>
                    <h3>Animating Bars with Audio Data</h3>
                    <p>Update the cubes’ height in sync with the audio’s frequency data:</p>
                    <pre><code>function animate() {
    requestAnimationFrame(animate);
    analyser.getByteFrequencyData(dataArray);
    bars.forEach((bar, index) => {
        bar.scale.y = dataArray[index] / 50;
    });
    renderer.render(scene, camera);
}
animate();</code></pre>
                    <p>Each bar’s height dynamically adjusts to the amplitude of each frequency band.</p>
                </section>

                <section id="interaction">
                    <h2>Adding User Interaction</h2>
                    <p>For a more immersive experience, let’s allow users to interact with the visualization using their mouse:</p>
                    <pre><code>document.addEventListener('mousemove', (event) => {
    const x = (event.clientX / window.innerWidth) * 2 - 1;
    const y = -(event.clientY / window.innerHeight) * 2 + 1;
    camera.position.x = x * 5;
    camera.position.y = y * 5;
});</code></pre>
                    <p>Here, the camera moves in response to the user’s mouse position, creating a dynamic view of the visualization.</p>
                </section>
            </div>
        </article>
    </main>

    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/foot.php'; ?>
</body>
</html>
