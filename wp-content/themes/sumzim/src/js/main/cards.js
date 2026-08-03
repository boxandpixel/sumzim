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

/**
 * Card heading alignment
 *
 * .card-overlay-content is absolutely positioned against the bottom of the card,
 * so it grows upward and its height follows its content. Cards whose descriptions
 * wrap to different line counts therefore sit their headings at different heights.
 *
 * This equalizes the overlay height across each grid row so headings pin to the
 * same line — and, on cards that have a button, so the button stays flush to the
 * bottom (see the flex: 1 on .card-description in _cards.scss).
 *
 * Deliberately NOT scoped to [data-cards-animate]: only one of the cards blocks
 * on the site carries that attribute, and alignment applies to all of them.
 */

function initCardsAlign(context = document) {
    const blocks = context.querySelectorAll('.cards-block');

    if (!blocks.length) return;

    blocks.forEach((block) => {
        // Only the image/overlay variant has this problem. The .card-content
        // fallback is in normal flow inside an aspect-ratio box and already
        // top-aligns, so leave it alone.
        const cards = Array.from(block.querySelectorAll('.card')).filter(
            (card) => card.querySelector('.card-overlay-content')
        );

        if (cards.length < 2) return;

        // Release previous sizing before measuring, so we read natural heights.
        cards.forEach((card) => {
            card.querySelector('.card-overlay-content').style.height = '';
        });

        // Group by vertical position — cards sharing an offsetTop are one visual
        // row. Avoids hardcoding a column count, and is a no-op when the grid
        // collapses to a single column at mobile/tablet.
        const rows = new Map();

        cards.forEach((card) => {
            const top = Math.round(card.offsetTop);
            if (!rows.has(top)) rows.set(top, []);
            rows.get(top).push(card);
        });

        rows.forEach((rowCards) => {
            if (rowCards.length < 2) return;

            const overlays = rowCards.map((card) =>
                card.querySelector('.card-overlay-content')
            );

            // offsetHeight, not scrollHeight: we want the height after the
            // line-clamp has already limited the description.
            let tallest = Math.max(...overlays.map((el) => el.offsetHeight));

            // Safety rail — never let the overlay outgrow the image it sits on.
            // Guard on > 0: inside a hidden ancestor (an unrendered ACF preview,
            // say) clientHeight reads 0, and clamping to that would collapse the
            // overlay and hide the content entirely.
            const wrapper = rowCards[0].querySelector('.card-image-wrapper');
            if (wrapper && wrapper.clientHeight > 0) {
                tallest = Math.min(tallest, wrapper.clientHeight);
            }

            // Nothing measurable yet — leave the natural height alone.
            if (tallest <= 0) return;

            overlays.forEach((el) => {
                el.style.height = tallest + 'px';
            });
        });
    });
}

(function () {
    let resizeTimer;

    function runAlign() {
        initCardsAlign();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', runAlign);
    } else {
        runAlign();
    }

    // Text metrics change when Raleway swaps in, which changes how many lines
    // each description wraps to. Re-measure once fonts settle.
    if (document.fonts && document.fonts.ready) {
        document.fonts.ready.then(runAlign);
    } else {
        window.addEventListener('load', runAlign);
    }

    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(runAlign, 150);
    });

    // ACF block preview support
    if (window.acf) {
        window.acf.addAction('render_block_preview/type=cards', ($el) =>
            initCardsAlign($el[0])
        );
    }
})();