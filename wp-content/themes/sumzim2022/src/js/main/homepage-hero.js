/**
 * Homepage Hero Parallax
 * 
 * Translates hero content upward at a slower rate on scroll
 * for a subtle parallax depth effect. Disabled on mobile for performance.
 */
(function () {
  const hero = document.querySelector('.homepage-hero');
  if (!hero) return;

  const content = hero.querySelector('.homepage-hero__content');
  const media = hero.querySelector('.homepage-hero__media');
  if (!content) return;

  // Skip parallax on mobile — not worth the performance cost
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (prefersReducedMotion) return;

  let ticking = false;
  let isVisible = true;

  // Only run parallax when hero is in viewport
  const observer = new IntersectionObserver(
    ([entry]) => {
      isVisible = entry.isIntersecting;
    },
    { threshold: 0 }
  );
  observer.observe(hero);

function updateParallax() {
    if (!isVisible) {
        ticking = false;
        return;
    }

    const rect = hero.getBoundingClientRect();
    // Use heroHeight as origin so parallax starts immediately from page load
    const scrolled = hero.offsetHeight - rect.bottom;

    // Content moves up faster
    const contentOffset = scrolled * 0.4;
    content.style.transform = `translate3d(0, -${contentOffset}px, 0)`;

    // Media moves up slower
    if (media) {
        const mediaOffset = scrolled * 0.15;
        media.style.transform = `translate3d(0, ${mediaOffset}px, 0)`;
    }

    ticking = false;
}

  window.addEventListener(
    'scroll',
    function () {
      if (!ticking) {
        requestAnimationFrame(updateParallax);
        ticking = true;
      }
    },
    { passive: true }
  );
})();