document.addEventListener('DOMContentLoaded', function() {
    const cover = document.getElementById('cover');
    const hasSeenAnimation = localStorage.getItem('hasSeenCoverAnimation');

    // If user hasn't seen the animation before, show it
    if (!hasSeenAnimation) {
        cover.style.display = 'flex'; // Ensure it's visible
    } else {
        cover.style.display = 'none'; // Hide it immediately if they've seen it
        return; // Exit early
    }

    let hasTriggered = false;

    function hideCover() {
        if (!hasTriggered) {
            cover.classList.add('fade-out');
            hasTriggered = true;
            
            // Store that user has seen the animation
            localStorage.setItem('hasSeenCoverAnimation', 'true');
            
            // Remove the cover completely after animation
            setTimeout(() => {
                cover.style.display = 'none';
            }, 1500);
        }
    }

    // Trigger on scroll or click
    window.addEventListener('scroll', hideCover);
    window.addEventListener('click', hideCover);
    window.addEventListener('touchstart', hideCover);
});