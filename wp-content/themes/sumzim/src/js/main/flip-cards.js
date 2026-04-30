(function () {
  function initFlipCards(context = document) {
    context.querySelectorAll('.flip-card').forEach(card => {
      // Prevent double-binding
      if (card.dataset.flipBound) return;
      card.dataset.flipBound = 'true';

      card.addEventListener('click', (e) => {
        // Allow links on the back to work normally
        if (e.target.closest('a')) return;

        card.classList.toggle('is-flipped');
      });
    });
  }

  document.addEventListener('DOMContentLoaded', () => {
    initFlipCards();
  });

  // ACF block preview support
  if (window.acf) {
    window.acf.addAction(
      'render_block_preview/type=flip-cards',
      ($el) => initFlipCards($el[0])
    );
  }
})();