<link rel="stylesheet" href="/css/nav.css">
<link rel="stylesheet" href="/css/root.css">
<script src="/js/nav.js"></script>
<div class="nav-container">
    <button id="nav-toggle" class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <nav id="side-nav" class="side-nav">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/about">About Me</a></li>
            <li><a href="/pages">Web Designs</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">Info <span class="dropdown-arrow">▼</span></a>
                <ul class="dropdown-menu">
                    <li><a href="/info/musician-tips">Music Articles</a></li>
                    <li><a href="/info/technology">Tech Articles</a></li>
                </ul>
            </li>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="/logout">Logout</a>
            <?php else: ?>
                <li><a href="/login">Login</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="/members">Account</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>