<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Here is a cumulation of the current final versions of my javascript projects I have made since I have started coding. this page will be updated as I learn how to do more things">
    <title>Max | Projects</title>
    <link rel="stylesheet" href="/css/cover.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/footer.css">
    <script src="/js/search.js"></script>
    <script src="/js/cover.js"></script>
</head>
<body>
    <?php include 'cover.php'; ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/nav.php'; ?>
    
    <header class="hero">
        <div class="hero-content">
            <div class="profile-content">
                <div class="name-title-wrapper">
                    <h1>Max</h1>
                    <p class="subtitle">Frontend Developer & <br>Creative Animator</p>
                    <p class="tech-stack">Next.js • PHP • Javascript • Creative Development</p>
                </div>
                <div class="social-links">
                    <a href="https://www.linkedin.com/in/max-warren-b09b69282/" class="social-link" target="_blank" rel="noopener noreferrer">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                            <rect x="2" y="9" width="4" height="12"></rect>
                            <circle cx="4" cy="4" r="2"></circle>
                        </svg>
                        LinkedIn
                    </a>
                    <a href="https://github.com/composedbymax/PHP-website" class="social-link" target="_blank" rel="noopener noreferrer">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                        </svg>
                        GitHub
                    </a>
                </div>
            </div>
        </div>
    </header>

    <div class="search-container">
        <div class="search-wrapper">
            <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
            <input type="text" id="search-input" placeholder="Search projects">
        </div>
    </div>

    <main class="content">
        
        <div class="projects-grid">
            <?php 
            $projects = [
                [
                    "link" => "projects/download-audio-visuals",
                    "img" => "/img/gif/VIZ.gif",
                    "title" => "VIZ",
                    "description" => "Audio-reactive visualization engine",
                    "tags" => ["Javascript", "Chroma.js", "Canvas API"],
                    "info" => "Upload background/center image and audio file.<br>Press start/stop recording"
                ],
                [
                    "link" => "projects/short-time-fourier-transform",
                    "img" => "/img/gif/STFT.gif",
                    "title" => "STFT",
                    "description" => "Real-time audio frequency analyzer",
                    "tags" => ["Javascript", "Three.js", "WebAudio"],
                    "info" => "Enable mic/upload audio to see audio reactive short time fourier transform analysis"
                ],
                [
                    "link" => "projects/live-audio-visuals",
                    "img" => "/img/gif/Liveit.gif",
                    "title" => "Liveit",
                    "description" => "Interactive live performance visuals",
                    "tags" => ["Javascript", "Three.js", "GSAP.js"],
                    "info" => "Enable mic to see audio-reactive visuals.<br>Press arrow keys to switch visualizer type"
                ],
                [
                    "link" => "projects/art-gallery",
                    "img" => "/img/gif/art-gallery.gif",
                    "title" => "Art Gallery",
                    "description" => "Explore art in a 3js enviorment",
                    "tags" => ["Javascript", "Three.js", "WebGL"],
                    "info" => "navigate through the gallery with arrow keys, and changing perspective with mouse"
                ],
                [
                    "link" => "projects/batch-color-grade",
                    "img" => "/img/gif/CGR.gif",
                    "title" => "CGR",
                    "description" => "Batch image color grading tool",
                    "tags" => ["Javascript", "JSZIP.js", "Canvas API"],
                    "info" => "Upload reference file.<br>Upload batch images.<br>Process to color match all images"
                ],
                [
                    "link" => "projects/image-effects",
                    "img" => "/img/gif/image-effects.gif",
                    "title" => "IMG EFFECT",
                    "description" => "image-effects",
                    "tags" => ["Javascript", "Canvas API"],
                    "info" => "Upload file<br>Select effects<br>Download"
                ],
                [
                    "link" => "projects/color-picker",
                    "img" => "/img/gif/color-picker.gif",
                    "title" => "Color Codes",
                    "description" => "color-picker",
                    "tags" => ["Javascript", "Canvas API"],
                    "info" => "Select color from wheel and note HEX, RGB, and HSL measurements"
                ],
                [
                    "link" => "projects/image-symmetry-processor",
                    "img" => "/img/gif/SYM.gif",
                    "title" => "SYM",
                    "description" => "image-symmetry-processor",
                    "tags" => ["Javascript", "Canvas API"],
                    "info" => "Upload reference file<br>Select reflecting axis<br>Process to add symmetry to images"
                ],
                [
                    "link" => "projects/create-SVG",
                    "img" => "/img/gif/SVG.gif",
                    "title" => "SVG",
                    "description" => "Vector graphics generator",
                    "tags" => ["Javascript", "DOM manipulation", "State Management"],
                    "info" => "Design a SVG using provided shapeable blocks.<br>Generate to code or .svg file"
                ],
                [
                    "link" => "projects/simple-EQ",
                    "img" => "/img/gif/simple-EQ.gif",
                    "title" => "simple EQ",
                    "description" => "simple-EQ",
                    "tags" => ["Javascript", "Audio API"],
                    "info" => "simple-EQ for frequency zone detection"
                ],
                [
                    "link" => "projects/code-preview",
                    "img" => "/img/gif/code-preview.gif",
                    "title" => "code preview",
                    "description" => "code preview",
                    "tags" => ["Javascript"],
                    "info" => "simple online code-preview"
                ],
            ];
            foreach ($projects as $project) {
                echo '<div class="project-card" data-title="'.strtolower($project["title"]).'">
                        <div class="card-content">
                            <a href="' . htmlspecialchars($project["link"]) . '">
                                <div class="card-image">
                                    <img src="' . htmlspecialchars($project["img"]) . '" alt="' . htmlspecialchars($project["title"]) . ' Preview">
                                </div>
                                <div class="card-info">
                                    <h3 class="card-title">' . htmlspecialchars($project["title"]) . '</h3>
                                    <p class="card-description">' . htmlspecialchars($project["description"]) . '</p>
                                    <div class="card-tags">';
                foreach ($project["tags"] as $tag) {
                    echo '<span class="tag">' . htmlspecialchars($tag) . '</span>';
                }
                echo '          </div>
                                </div>
                            </a>
                            <div class="info-tooltip">
                                <div class="info-icon">i</div>
                                <div class="tooltip-content">
                                    <h4>' . htmlspecialchars($project["title"]) . '</h4>
                                    <p>' . $project["info"] . '</p>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/foot.php'; ?>
</body>
</html>