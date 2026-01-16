(function() {
    'use strict';
    
    function initExpandableCards() {
        if (window.expandableCardsInitialized) return;
        window.expandableCardsInitialized = true;
        
        var cardsContainers = document.querySelectorAll('[data-expandable-cards-static]');
        
        cardsContainers.forEach(function(container) {
            var cardsWrapper = container.querySelector('.cards');
            var cards = container.querySelectorAll('.card');
            var modal = document.querySelector('[data-card-modal]');
            var modalClose = modal ? modal.querySelector('[data-modal-close]') : null;
            var modalImage = modal ? modal.querySelector('[data-modal-image]') : null;
            var modalTitle = modal ? modal.querySelector('[data-modal-title]') : null;
            var modalDescription = modal ? modal.querySelector('[data-modal-description]') : null;
            var modalLink = modal ? modal.querySelector('[data-modal-link]') : null;
            
            var isMobile = function() { 
                return window.innerWidth < 768; 
            };
            
            var expandedCardIndex = null;
            
            cards.forEach(function(card, index) {
                var expandBtn = card.querySelector('[data-expand-card]');
                var closeBtn = card.querySelector('[data-close-card]');
                
                if (expandBtn) {
                    expandBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        
                        if (isMobile()) {
                            openModal(card);
                        } else {
                            expandCard(card, index);
                        }
                    });
                }
                
                if (closeBtn) {
                    closeBtn.addEventListener('click', function(e) {
                        e.stopPropagation();
                        collapseAllCards();
                    });
                }
                
                card.addEventListener('click', function(e) {
                    var isLink = e.target.closest('a');
                    if (isMobile() && !isLink) {
                        openModal(card);
                    }
                });
            });
            
            if (modalClose) {
                modalClose.addEventListener('click', function() {
                    modal.classList.remove('active');
                    document.body.style.overflow = '';
                });
            }
            
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        modal.classList.remove('active');
                        document.body.style.overflow = '';
                    }
                });
            }
            
            function expandCard(card, index) {
                if (expandedCardIndex === index) {
                    collapseAllCards();
                    return;
                }
                
                if (expandedCardIndex !== null) {
                    collapseAllCards();
                }
                
                expandedCardIndex = index;
                card.classList.add('expanded');
                
                var gap = 24;
                var cardPosition = 0;
                
                for (var i = 0; i < index; i++) {
                    cardPosition += cards[i].offsetWidth + gap;
                }
                
                cardsWrapper.style.transform = 'translateX(-' + cardPosition + 'px)';
                
                cards.forEach(function(c, i) {
                    if (i < index) {
                        c.classList.add('hidden');
                    } else if (i === index + 1) {
                        c.classList.add('peek-card');
                    } else if (i > index + 1) {
                        c.classList.add('hidden');
                    }
                });
            }
            
            function collapseAllCards() {
                if (expandedCardIndex === null) return;
                
                cardsWrapper.style.transform = 'translateX(0)';
                
                cards.forEach(function(card) {
                    card.classList.remove('expanded', 'hidden', 'peek-card');
                });
                
                expandedCardIndex = null;
            }
            
            function openModal(card) {
                var image = card.style.getPropertyValue('--bg-image');
                var headingEl = card.querySelector('.card__heading');
                var heading = headingEl ? headingEl.textContent : '';
                var descEl = card.querySelector('.card__description');
                var description = descEl ? descEl.innerHTML : '';
                var link = card.querySelector('.card__link');
                
                if (image && modal) {
                    modal.style.setProperty('--bg-image', image);
                }
                
                if (modalImage && image) {
                    var imageUrl = image.replace(/url\(['"]?(.+?)['"]?\)/, '$1');
                    modalImage.src = imageUrl;
                    modalImage.alt = heading;
                }
                
                if (modalTitle) modalTitle.textContent = heading;
                if (modalDescription) modalDescription.innerHTML = description;
                
                if (modalLink && link) {
                    modalLink.href = link.href;
                    modalLink.textContent = link.textContent;
                    modalLink.target = link.target;
                    modalLink.style.display = 'inline-flex';
                } else if (modalLink) {
                    modalLink.style.display = 'none';
                }
                
                if (modal) {
                    modal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }
            }
            
            var resizeTimer;
            window.addEventListener('resize', function() {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function() {
                    if (!isMobile() && modal) {
                        modal.classList.remove('active');
                        document.body.style.overflow = '';
                    }
                    if (expandedCardIndex !== null) {
                        collapseAllCards();
                    }
                }, 250);
            });
        });
    }
    
    // Initialize on DOM ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initExpandableCards);
    } else {
        initExpandableCards();
    }
})();