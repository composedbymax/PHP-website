<?php
$page_title = "Inteliuz | Musicians";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Audio visualization tutorials, techniques, and resources">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="/css/info/style.css">
    <link rel="stylesheet" href="/css/info/article.css">
</head>
<body>
    <!-- Header -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/nav.php'; ?>

    <!-- Main Content -->
    <main class="page-content">
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-content">
                <h1>Musician Tips and tricks</h1>
                <p>Elevate your music career with powerful marketing strategies, branding advice, and promotional tools</p>
            </div>
        </section>

        <!-- Search and Filter Section -->
        <div class="search-filter-container">
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search articles..." aria-label="Search articles">
            </div>
            <div class="filter-options">
                <button class="filter-btn active" data-category="all">All</button>
                <button class="filter-btn" data-category="beginner">Beginner</button>
                <button class="filter-btn" data-category="intermediate">Intermediate</button>
                <button class="filter-btn" data-category="advanced">Advanced</button>
            </div>
        </div>

        <?php
        include 'listmusic.php';
        ?>

        <!-- Article Sections -->
        <section class="articles-container">
            <?php foreach ($sections as $sectionKey => $section): ?>
                <div class="section-wrapper">
                    <div class="section-header">
                        <h2><?php echo htmlspecialchars($section['title']); ?></h2>
                    </div>
                    
                    <div class="articles-grid">
                        <?php foreach ($section['articles'] as $article): ?>
                            <?php
                                // Generate the URL slug from the article title
                                $slug = strtolower(str_replace(' ', '-', $article['title']));
                            ?>
                            <article class="article-card" data-category="<?php echo htmlspecialchars($article['difficulty']); ?>">
                                <div class="article-image">
                                    <div class="category-tag"><?php echo htmlspecialchars($article['category']); ?></div>
                                </div>
                                <div class="article-content">
                                    <h3><?php echo htmlspecialchars($article['title']); ?></h3>
                                    <p><?php echo htmlspecialchars($article['excerpt']); ?></p>
                                    <div class="article-meta">
                                        <div class="meta-left">
                                            <span class="date"><?php echo date('M j, Y', strtotime($article['date'])); ?></span>
                                            <span class="author"><?php echo htmlspecialchars($article['author']); ?></span>
                                        </div>
                                        <!-- Replace "#" with the actual link -->
                                        <a href="articles/<?php echo $slug; ?>" class="read-more">Read More</a>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/inc/foot.php'; ?>

    <!-- Footer -->
    <script src="/js/info/article.js"></script>
</body>