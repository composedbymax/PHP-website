document.addEventListener('DOMContentLoaded', () => {
    const cardImages = document.querySelectorAll('.card-image');
    let shimmerIndex = 0;

    // Shimmer effect on each card image in order
    function shimmerSequentially() {
        if (shimmerIndex < cardImages.length) {
            const cardImage = cardImages[shimmerIndex];
            shimmerCard(cardImage);
            shimmerIndex++;
        } else {
            shimmerIndex = 0;
        }
    }

    // Trigger shimmer effect
    function shimmerCard(cardImage) {
        cardImage.classList.add('shimmer');
        setTimeout(() => {
            cardImage.classList.remove('shimmer');
        }, 1000);
    }

    // Start shimmering every 2 seconds, each card one by one
    setInterval(shimmerSequentially, 2000);

    // Intersection Observer for initial load fade-in
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        observer.observe(card);
    });
});