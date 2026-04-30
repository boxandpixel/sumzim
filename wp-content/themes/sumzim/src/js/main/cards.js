/**
 * Cards scroll animation
 * 
 * Uses IntersectionObserver for performance — no scroll event listeners.
 * Adds/removes .is-visible so animations reverse when scrolling back up.
 * Only initializes on sections with [data-cards-animate].
 */

function initCardsAnimation() {
    const sections = document.querySelectorAll('[data-cards-animate]');
    
    if (!sections.length) return;

    // Respect reduced motion
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const observerOptions = {
        root: null,
        rootMargin: '0px 0px -80px 0px', // Trigger slightly before fully in view
        threshold: 0.15 // 15% visible to trigger
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            } else {
                entry.target.classList.remove('is-visible');
            }
        });
    }, observerOptions);

    sections.forEach((section) => {
        const cards = section.querySelectorAll('.card');
        cards.forEach((card) => observer.observe(card));
    });
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCardsAnimation);
} else {
    initCardsAnimation();
}