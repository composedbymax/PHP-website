<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creating stunning web experiences through SVG animations">
  <title>SVG Magic | Beautiful Web Experiences</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    }

    body {
      background: #000;
      min-height: 100vh;
      overflow-x: hidden;
      color: white;
    }

    .art-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
    }

    .content {
      position: relative;
      z-index: 2;
      padding: 2rem;
      max-width: 1200px;
      margin: 0 auto;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      gap: 4rem;
    }

    .hero {
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      gap: 2rem;
    }

    .hero h1 {
      font-size: clamp(2rem, 8vw, 5rem);
      font-weight: 200;
      letter-spacing: 0.5rem;
      animation: fadeSlideUp 1.5s ease-out forwards;
      opacity: 0;
      transform: translateY(30px);
    }

    .hero p {
      font-size: clamp(1rem, 3vw, 1.5rem);
      font-weight: 300;
      max-width: 800px;
      line-height: 1.6;
      animation: fadeSlideUp 1.5s ease-out 0.5s forwards;
      opacity: 0;
      transform: translateY(30px);
    }

    .features {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      padding: 4rem 0;
    }

    .feature-card {
      background: rgba(255, 255, 255, 0.05);
      padding: 2rem;
      border-radius: 1rem;
      backdrop-filter: blur(10px);
      animation: fadeSlideUp 1s ease-out forwards;
      opacity: 0;
      transform: translateY(30px);
    }

    .feature-card h3 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      font-weight: 400;
    }

    .feature-card p {
      font-weight: 300;
      line-height: 1.6;
    }

    @keyframes fadeSlideUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    svg {
      width: 100%;
      height: 100%;
      position: absolute;
    }

    .background-layer {
      filter: blur(2px);
    }

    .scroll-indicator {
      position: absolute;
      bottom: 2rem;
      left: 50%;
      transform: translateX(-50%);
      animation: bounce 2s infinite;
    }

    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% {
        transform: translateX(-50%) translateY(0);
      }
      40% {
        transform: translateX(-50%) translateY(-30px);
      }
      60% {
        transform: translateX(-50%) translateY(-15px);
      }
    }
  </style>
</head>
<body>
  <div class="art-container">
    <!-- Background Layer -->
    <svg class="background-layer" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid slice">
      <defs>
        <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="100%">
          <stop offset="0%" style="stop-color:#1a1a1a;stop-opacity:1">
            <animate attributeName="stop-color" 
                     values="#1a1a1a;#2c1a4d;#1a1a1a" 
                     dur="10s" 
                     repeatCount="indefinite"/>
          </stop>
          <stop offset="100%" style="stop-color:#4a1a42;stop-opacity:1">
            <animate attributeName="stop-color" 
                     values="#4a1a42;#1a4d4d;#4a1a42" 
                     dur="10s" 
                     repeatCount="indefinite"/>
          </stop>
        </linearGradient>
        <filter id="turbulence">
          <feTurbulence type="fractalNoise" baseFrequency="0.01 0.01" numOctaves="3" seed="1">
            <animate attributeName="baseFrequency" 
                     values="0.01 0.01;0.015 0.015;0.01 0.01" 
                     dur="30s" 
                     repeatCount="indefinite"/>
          </feTurbulence>
          <feDisplacementMap in="SourceGraphic" scale="50"/>
        </filter>
      </defs>
      <rect width="100%" height="100%" fill="url(#grad1)" filter="url(#turbulence)"/>
    </svg>

    <!-- Middle Layer -->
    <svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid slice">
      <defs>
        <filter id="glow">
          <feGaussianBlur stdDeviation="2" result="coloredBlur"/>
          <feMerge>
            <feMergeNode in="coloredBlur"/>
            <feMergeNode in="SourceGraphic"/>
          </feMerge>
        </filter>
      </defs>
      
      <path d="M0,50 Q25,30 50,50 T100,50" 
            fill="none" 
            stroke="rgba(255,255,255,0.2)" 
            stroke-width="0.2" 
            filter="url(#glow)">
        <animate attributeName="d" 
                 values="M0,50 Q25,30 50,50 T100,50;
                        M0,50 Q25,70 50,50 T100,50;
                        M0,50 Q25,30 50,50 T100,50" 
                 dur="20s" 
                 repeatCount="indefinite"/>
      </path>
      
      <g opacity="0.6">
        <path d="M0,20 Q30,40 50,20 T100,20" 
              fill="none" 
              stroke="rgba(138,43,226,0.2)" 
              stroke-width="0.2" 
              filter="url(#glow)">
          <animate attributeName="d" 
                   values="M0,20 Q30,40 50,20 T100,20;
                          M0,20 Q30,0 50,20 T100,20;
                          M0,20 Q30,40 50,20 T100,20" 
                   dur="15s" 
                   repeatCount="indefinite"/>
        </path>
        
        <path d="M0,80 Q30,100 50,80 T100,80" 
              fill="none" 
              stroke="rgba(65,105,225,0.2)" 
              stroke-width="0.2" 
              filter="url(#glow)">
          <animate attributeName="d" 
                   values="M0,80 Q30,100 50,80 T100,80;
                          M0,80 Q30,60 50,80 T100,80;
                          M0,80 Q30,100 50,80 T100,80" 
                   dur="18s" 
                   repeatCount="indefinite"/>
        </path>
      </g>
    </svg>

    <!-- Foreground Layer -->
    <svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid slice">
      <g fill="white" opacity="0.5">
        <circle cx="10" cy="10" r="0.2">
          <animate attributeName="cy" 
                   values="10;90;10" 
                   dur="20s" 
                   repeatCount="indefinite"/>
          <animate attributeName="opacity" 
                   values="0;1;0" 
                   dur="20s" 
                   repeatCount="indefinite"/>
        </circle>
        <circle cx="30" cy="20" r="0.15">
          <animate attributeName="cy" 
                   values="20;80;20" 
                   dur="25s" 
                   repeatCount="indefinite"/>
          <animate attributeName="opacity" 
                   values="0;1;0" 
                   dur="25s" 
                   repeatCount="indefinite"/>
        </circle>
        <circle cx="70" cy="30" r="0.25">
          <animate attributeName="cy" 
                   values="30;70;30" 
                   dur="15s" 
                   repeatCount="indefinite"/>
          <animate attributeName="opacity" 
                   values="0;1;0" 
                   dur="15s" 
                   repeatCount="indefinite"/>
        </circle>
      </g>
    </svg>
  </div>

  <main class="content">
    <section class="hero">
      <h1>SVG Magic</h1>
      <p>Creating stunning web experiences through the power of SVG animations. Deliver beautiful, interactive content with minimal server load.</p>
      <div class="scroll-indicator">
        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M12 5v14M5 12l7 7 7-7"/>
        </svg>
      </div>
    </section>

    <section class="features">
      <div class="feature-card">
        <h3>Lightweight Performance</h3>
        <p>Create smooth, responsive animations without heavy JavaScript libraries or video files.</p>
      </div>
      
      <div class="feature-card">
        <h3>Cross-Browser Support</h3>
        <p>SVG animations work seamlessly across all modern browsers and devices.</p>
      </div>
      
      <div class="feature-card">
        <h3>Infinite Scalability</h3>
        <p>Vector-based graphics maintain crystal clear quality at any resolution.</p>
      </div>
    </section>
  </main>
</body>
</html>