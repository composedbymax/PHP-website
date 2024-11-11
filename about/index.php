<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max | Front-End Developer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/css/about.css">
</head>
<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/nav.php'; ?>
    <main class="hero">
        <div class="container">
            <div class="content">
                <div class="intro">
                    <span class="tag">Available for Hire</span>
                    <h1>Front-End Developer<br>& UI Designer</h1>
                    <p class="lead">Crafting exceptional digital experiences through clean code and modern design patterns. Specialized in React ecosystem with Next.js, and passionate about creating responsive, accessible web applications.</p>
                    
                    <div class="stats">
                        <div class="stat-item">
                            <div class="stat-value" id="experience-months">0</div>
                            <div class="stat-label">Months of Experience</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-value">5+</div>
                            <div class="stat-label">Indiviudal Projects Completed</div>
                        </div>
                    </div>
                </div>

                <div class="tech-stack">
                    <div class="tech-card">
                        <i class="fas fa-cogs tech-icon"></i>
                        <h3 class="tech-title">Next.js / Custom Stacks</h3>
                        <p class="tech-description">Building fast, SEO-driven applications with Next.js or framework-free tech stacks, combining PHP, JavaScript, HTML, CSS, and JSON for tailored, efficient solutions.</p>
                        <div class="experience-bar">
                            <div class="experience-progress" style="width: 90%"></div>
                        </div>
                    </div>

                    
                    <div class="tech-card">
                        <i class="fab fa-js tech-icon"></i>
                        <h3 class="tech-title">JavaScript / TypeScript</h3>
                        <p class="tech-description">Crafting scalable, maintainable solutions with TypeScript. Exploring new possibilities through JavaScript</p>
                        <div class="experience-bar">
                            <div class="experience-progress" style="width: 85%"></div>
                        </div>
                    </div>
                    
                    <div class="tech-card">
                        <i class="fab fa-css3-alt tech-icon"></i>
                        <h3 class="tech-title">Modern CSS & Tailwind</h3>
                        <p class="tech-description">Responsive layouts and Engaging UIs using modern CSS features and Tailwind CSS</p>
                        <div class="experience-bar">
                            <div class="experience-progress" style="width: 95%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/foot.php'; ?>

    <script src="/js/about.js" defer></script>
</body>
</html>