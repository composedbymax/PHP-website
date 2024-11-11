<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SVG Creations - Interactive SVG Art Gallery">
    <title>SVG Creations</title>
    <style>
        /* Reset and full-page layout */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            overflow: hidden;
            background: radial-gradient(circle, #002147, #1a1f3c);
            font-family: 'Arial', sans-serif;
            color: white;
        }

        .scene-container {
            width: 100vw;
            height: 100vh;
            position: relative;
        }

        /* Original SVG animations */
        .sun {
            fill: url(#sunGradient);
            filter: blur(3px);
            animation: sunGlow 6s infinite alternate ease-in-out;
        }

        @keyframes sunGlow {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }

        .water {
            fill: url(#waterGradient);
            animation: waterWave 4s infinite ease-in-out;
        }

        @keyframes waterWave {
            0%, 100% { transform: translateY(60); }
            50% { transform: translateY(5px); }
        }

        .mountain {
            fill: url(#mountainGradient);
            filter: drop-shadow(0px 5px 5px rgba(0, 0, 0, 0.6));
            transition: fill 0.3s ease;
        }

        .mountain:hover {
            fill: #4a6b8a;
        }

        .mountain-foreground {
            fill: #2d3b55;
            filter: drop-shadow(0px 7px 7px rgba(0, 0, 0, 0.7));
        }

        .star {
            fill: white;
            opacity: 0.8;
            animation: twinkle 2s infinite alternate;
        }

        @keyframes twinkle {
            0% { opacity: 0.5; }
            100% { opacity: 1; }
        }

        /* About Button and Popup */
        .nav {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 100;
        }

        .about-button {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 10px 20px;
            color: white;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .about-button:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .about-popup {
          display: none;
          position: fixed;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          background: rgba(0, 0, 0, 0.9); /* Slightly darker background */
          backdrop-filter: blur(10px);
          -webkit-backdrop-filter: blur(10px); /* For Safari support */
          border-radius: 15px;
          padding: 30px;
          max-width: 500px;
          color: white;
          text-align: center;
          animation: fadeIn 0.3s ease;
          border: 1px solid rgba(255, 255, 255, 0.1);
          box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
          z-index: 9999; /* High z-index to appear over everything */
        }

        .about-popup.show {
            display: block;
        }

        .about-popup h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #ffd700;
        }

        .about-popup p {
            line-height: 1.6;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .close-button {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .close-button:hover {
            opacity: 1;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translate(-50%, -40%); }
            to { opacity: 1; transform: translate(-50%, -50%); }
        }

        /* Title and Hero Text */
        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 10;
        }

        .title {
            font-size: 4rem;
            margin-bottom: 1rem;
            text-shadow: 0 0 20px rgba(0,0,0,0.5);
            animation: floatText 3s infinite alternate ease-in-out;
        }

        .subtitle {
            font-size: 1.5rem;
            opacity: 0.8;
            text-shadow: 0 0 10px rgba(0,0,0,0.5);
        }

        @keyframes floatText {
            0% { transform: translateY(0); }
            100% { transform: translateY(-10px); }
        }
    </style>
</head>
<body>
    <!-- Navigation - About Button Only -->
    <nav class="nav">
        <button class="about-button">About</button>
    </nav>

    <!-- About Popup -->
    <div class="about-popup">
        <button class="close-button">&times;</button>
        <h2>Welcome to My SVG World</h2>
        <p>SVG creation is more than just code to me—it's a canvas where mathematics meets art, where precision dances with creativity. Every curve, every animation is crafted with passion to bring digital artistry to life.</p>
        <p>Through SVG, I've discovered a unique way to blend technical precision with artistic expression. Each element is carefully designed to create immersive, responsive, and beautiful web experiences that tell stories through motion and interaction.</p>
        <p>This peaceful mountain scene represents my love for creating serene digital landscapes where every element, from the glowing sun to the flowing water, comes together in perfect harmony.</p>
    </div>

    <!-- Hero Content -->
    <div class="hero-content">
        <h1 class="title">SVG Creations</h1>
        <p class="subtitle">Explore Interactive Digital Art</p>
    </div>

    <div class="scene-container">
        <svg width="100%" height="100%" viewBox="0 0 1000 600" preserveAspectRatio="none">
            <!-- Original Gradients -->
            <defs>
                <radialGradient id="sunGradient" cx="50%" cy="50%" r="50%">
                    <stop offset="0%" stop-color="#ffd700" />
                    <stop offset="100%" stop-color="#ff8c00" />
                </radialGradient>
                <linearGradient id="waterGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#1ca3ec" />
                    <stop offset="100%" stop-color="#007acc" />
                </linearGradient>
                <linearGradient id="mountainGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%" stop-color="#4a536b" />
                    <stop offset="100%" stop-color="#2e3a56" />
                </linearGradient>
            </defs>

            <!-- Sun -->
            <circle cx="500" cy="100" r="70" class="sun"></circle>

            <!-- Stars -->
            <circle cx="150" cy="70" r="2" class="star"></circle>
            <circle cx="250" cy="130" r="1.5" class="star"></circle>
            <circle cx="780" cy="90" r="2" class="star"></circle>
            <circle cx="680" cy="50" r="2" class="star"></circle>
            <circle cx="900" cy="70" r="1" class="star"></circle>

            <!-- Mountains -->
            <polygon points="200,500 400,220 600,500" class="mountain"></polygon>
            <polygon points="600,500 800,260 1000,500" class="mountain"></polygon>
            <polygon points="70,500 250,270 450,500" class="mountain"></polygon>

            <!-- Foreground Mountains -->
            <polygon points="0,500 200,320 400,500" class="mountain-foreground"></polygon>
            <polygon points="500,500 700,320 900,500" class="mountain-foreground"></polygon>
            <polygon points="800,500 200,320 400,500" class="mountain-foreground"></polygon>
            <polygon points="800,500 700,320 900,500" class="mountain-foreground"></polygon>
            <polygon points="500,500 400,220 600,500" class="mountain"></polygon>

            <!-- Water -->
            <path d="M0 440 Q 550 530 500 480 T 1000 480 V 600 H 20 Z" class="water"></path>
            <path d="M0 380 Q 250 540 500 490 T 1000 490 V 600 H 0 Z" class="water" style="opacity: 0.7;"></path>
            <path d="M0 440 Q 250 530 500 480 T 1000 480 V 600 H 20 Z" class="water"></path>
            <path d="M0 850 Q 250 540 500 490 T 1000 490 V 600 H 0 Z" class="water" style="opacity: 0.7;"></path>
        </svg>
    </div>

    <script>
        // About popup functionality
        const aboutButton = document.querySelector('.about-button');
        const aboutPopup = document.querySelector('.about-popup');
        const closeButton = document.querySelector('.close-button');

        aboutButton.addEventListener('click', () => {
            aboutPopup.classList.add('show');
        });

        closeButton.addEventListener('click', () => {
            aboutPopup.classList.remove('show');
        });

        // Close popup when clicking outside
        window.addEventListener('click', (e) => {
            if (!aboutButton.contains(e.target) && !aboutPopup.contains(e.target)) {
                aboutPopup.classList.remove('show');
            }
        });
    </script>
</body>
</html>