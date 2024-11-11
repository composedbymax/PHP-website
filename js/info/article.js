document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const filterButtons = document.querySelectorAll('.filter-btn');
    const articles = document.querySelectorAll('.article-card');

    // Search functionality
    searchInput.addEventListener('input', filterArticles);

    // Category filter functionality
    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
            
            filterArticles();
        });
    });

    function filterArticles() {
        const searchTerm = searchInput.value.toLowerCase();
        const activeCategory = document.querySelector('.filter-btn.active').dataset.category;

        articles.forEach(article => {
            const title = article.querySelector('h3').textContent.toLowerCase();
            const excerpt = article.querySelector('p').textContent.toLowerCase();
            const category = article.dataset.category;
            
            const matchesSearch = title.includes(searchTerm) || excerpt.includes(searchTerm);
            const matchesCategory = activeCategory === 'all' || category === activeCategory;

            if (matchesSearch && matchesCategory) {
                article.style.display = 'block';
                // Add fade-in animation
                article.style.opacity = '1';
                article.style.transform = 'translateY(0)';
            } else {
                article.style.display = 'none';
                article.style.opacity = '0';
                article.style.transform = 'translateY(20px)';
            }
        });
    }
});