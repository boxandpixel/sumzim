document.addEventListener('DOMContentLoaded', function() {
    const carousels = document.querySelectorAll('.google-reviews__carousel');
    
    carousels.forEach(function(carousel) {
        const cards = carousel.querySelectorAll('.google-reviews__card');
        const prevBtn = carousel.querySelector('.google-reviews__nav-btn--prev');
        const nextBtn = carousel.querySelector('.google-reviews__nav-btn--next');
        const currentSpan = carousel.querySelector('.google-reviews__current');
        const totalCards = parseInt(carousel.dataset.total);
        
        let currentIndex = 0;
        
        function showCard(index) {
            // Remove active class from all cards
            cards.forEach(card => card.classList.remove('active'));
            
            // Add active class to current card
            cards[index].classList.add('active');
            
            // Update pagination
            currentSpan.textContent = index + 1;
            
            currentIndex = index;
        }
        
        function nextCard() {
            let newIndex = currentIndex + 1;
            
            // Infinite scroll - wrap to beginning
            if (newIndex >= totalCards) {
                newIndex = 0;
            }
            
            showCard(newIndex);
        }
        
        function prevCard() {
            let newIndex = currentIndex - 1;
            
            // Infinite scroll - wrap to end
            if (newIndex < 0) {
                newIndex = totalCards - 1;
            }
            
            showCard(newIndex);
        }
        
        // Event listeners
        if (nextBtn) {
            nextBtn.addEventListener('click', nextCard);
        }
        
        if (prevBtn) {
            prevBtn.addEventListener('click', prevCard);
        }
        
        // Keyboard navigation
        carousel.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                prevCard();
            } else if (e.key === 'ArrowRight') {
                nextCard();
            }
        });
        
        // Optional: Auto-play (uncomment if you want auto-rotation)
        // let autoplayInterval;
        // function startAutoplay() {
        //     autoplayInterval = setInterval(nextCard, 5000); // 5 seconds
        // }
        // function stopAutoplay() {
        //     clearInterval(autoplayInterval);
        // }
        // startAutoplay();
        // carousel.addEventListener('mouseenter', stopAutoplay);
        // carousel.addEventListener('mouseleave', startAutoplay);
    });
});