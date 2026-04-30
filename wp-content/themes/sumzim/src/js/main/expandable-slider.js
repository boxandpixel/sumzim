class ExpandableCardSlider {
    constructor(container) {
        this.container = container;
        this.slider = container.querySelector('[data-cards-slider]');
        this.modal = document.querySelector('[data-card-modal]');
        
        if (!this.slider) return;
        
        this.currentIndex = 0;
        this.cards = Array.from(this.slider.children);
        this.totalCards = this.cards.length;
        this.expandedCard = null;
        this.expandedCardIndex = null;
        this.isAnimating = false;

        this.prevBtn = container.querySelector('[data-prev-btn]');
        this.nextBtn = container.querySelector('[data-next-btn]');
        
        this.init();
    }

    init() {
        this.calculateDimensions();
        this.bindEvents();
        this.setupCards();
        this.updateButtonStates();
    }

    calculateDimensions() {
        this.isMobile = window.innerWidth < 820;
        this.itemsPerView = this.isMobile ? 1 : 3; // Mobile: 1 card at a time, Desktop: 3 cards
        
        if (this.cards.length > 0) {
            if (this.isMobile) {
                // Mobile: Fixed width for 312px cards
                this.itemWidth = 300;
                this.gap = 16;
            } else {
                // Desktop: Calculate from actual card dimensions
                const firstCard = this.cards.find(card => !card.classList.contains('expanded'));
                if (firstCard) {
                    this.itemWidth = firstCard.offsetWidth;
                    
                    const cardsStyle = window.getComputedStyle(this.slider);
                    this.gap = parseInt(cardsStyle.gap) || 38;
                }
            }
        }
    }

    setupCards() {
        this.cards.forEach((card, index) => {
            const expandBtn = card.querySelector('[data-expand-card]');
            const closeBtn = card.querySelector('[data-close-card]');
            
            if (expandBtn) {
                expandBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    this.expandCard(card, index);
                });
            }
            
            if (closeBtn) {
                closeBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    e.preventDefault();
                    this.closeCard();
                });
            }
        });
    }

    expandCard(card, cardIndex) {
        if (this.isAnimating) return;
        
        if (this.isMobile) {
            this.openMobileModal(card);
            return;
        }
        
        // Close any currently expanded card
        if (this.expandedCard && this.expandedCard !== card) {
            this.closeCard();
            return;
        }
        
        this.isAnimating = true;
        this.expandedCard = card;
        this.expandedCardIndex = cardIndex;
        
        // Move the slider so the expanded card is at the left edge
        this.currentIndex = cardIndex;
        
        // Add expanded class
        card.classList.add('expanded');
        
        // Recalculate dimensions and update slider position
        setTimeout(() => {
            this.calculateDimensions();
            this.updateSlider();
            this.isAnimating = false;
        }, 100);
    }

    closeCard() {
        if (!this.expandedCard || this.isAnimating) return;
        
        this.isAnimating = true;
        
        // Remove expanded class
        this.expandedCard.classList.remove('expanded');
        
        // Reset expanded card reference
        this.expandedCard = null;
        this.expandedCardIndex = null;
        
        // Recalculate dimensions and update slider position
        setTimeout(() => {
            this.calculateDimensions();
            this.updateSlider();
            this.isAnimating = false;
        }, 100);
    }

    openMobileModal(card) {
        if (!this.modal) return;
        
        // Get card data using the new HTML structure with safe property access
        const headingElement = card.querySelector('.card__heading');
        const title = headingElement ? headingElement.textContent : '';
        
        // Get the --bg-image CSS variable from the card's inline style
        const bgImage = card.style.getPropertyValue('--bg-image');
        
        const descriptionElement = card.querySelector('.card__description');
        const description = descriptionElement ? descriptionElement.innerHTML : '';
        
        const link = card.querySelector('.card__link');
        const statistic = card.querySelector('.card__main-content-statistic');
        
        // Populate modal
        const modalTitle = this.modal.querySelector('[data-modal-title]');
        const modalImage = this.modal.querySelector('[data-modal-image]');
        const modalDescription = this.modal.querySelector('[data-modal-description]');
        const modalLink = this.modal.querySelector('[data-modal-link]');
        const modalStats = this.modal.querySelector('[data-modal-stats]');
        const modalContent = this.modal.querySelector('.card-modal__content');
        
        if (modalTitle) modalTitle.textContent = title;
        
        // Set both the img src AND the background image for the modal content
        if (bgImage) {
            // Extract URL from the CSS variable value (it's already in format "url('...')")
            const imageUrl = bgImage.match(/url\(['"]?([^'"]+)['"]?\)/);
            if (imageUrl && imageUrl[1]) {
                if (modalImage) {
                    modalImage.src = imageUrl[1];
                    modalImage.alt = title;
                }
                // Set the CSS variable for the modal content background
                if (modalContent) {
                    modalContent.style.setProperty('--bg-image', bgImage);
                }
            }
        }
        
        if (modalDescription) modalDescription.innerHTML = description;
        
        if (modalLink && link) {
            modalLink.href = link.href;
            modalLink.textContent = link.textContent;
            modalLink.target = link.target;
            modalLink.style.display = 'inline-flex';
        } else if (modalLink) {
            modalLink.style.display = 'none';
        }
        
        if (modalStats && statistic) {
            modalStats.innerHTML = statistic.innerHTML;
            modalStats.style.display = 'flex';
        } else if (modalStats) {
            modalStats.style.display = 'none';
        }
        
        // Show modal
        this.modal.classList.add('active');
        document.body.style.overflow = 'hidden';
        
        // Setup close functionality
        this.setupModalClose();
    }

    setupModalClose() {
        if (!this.modal) return;
        
        const closeBtn = this.modal.querySelector('[data-modal-close]');
        
        const closeModal = () => {
            this.modal.classList.remove('active');
            document.body.style.overflow = '';
        };
        
        // Close button click
        if (closeBtn) {
            closeBtn.addEventListener('click', closeModal, { once: true });
        }
        
        // Click outside modal
        this.modal.addEventListener('click', (e) => {
            if (e.target === this.modal) {
                closeModal();
            }
        }, { once: true });
        
        // Escape key
        const handleEscape = (e) => {
            if (e.key === 'Escape') {
                closeModal();
                document.removeEventListener('keydown', handleEscape);
            }
        };
        document.addEventListener('keydown', handleEscape);
    }

    bindEvents() {
        // Touch/swipe support removed
        window.addEventListener('resize', () => this.handleResize());

        // Bind next/prev buttons
        if (this.nextBtn) {
            this.nextBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.next();
            });
        }
        if (this.prevBtn) {
            this.prevBtn.addEventListener('click', (e) => {
                e.preventDefault();
                this.prev();
            });
        }        
    }

    handleResize() {
        const wasMobile = this.isMobile;
        this.calculateDimensions();
        
        // Close expanded card on resize
        if (this.expandedCard) {
            this.closeCard();
        }
        
        // Close mobile modal if switching to desktop
        if (wasMobile && !this.isMobile && this.modal && this.modal.classList.contains('active')) {
            this.modal.classList.remove('active');
            document.body.style.overflow = '';
        }
        
        if (wasMobile !== this.isMobile) {
            this.currentIndex = 0;
            this.updateSlider();
            this.updateButtonStates();
        }
    }

    next() {
        if (this.isAnimating) return;
        
        // Close expanded card when navigating
        if (this.expandedCard) {
            this.closeCard();
            return; // Let the close animation complete first
        }
        
        const maxIndex = Math.max(0, this.totalCards - this.itemsPerView);
        
        if (this.isMobile) {
            // Mobile: Move one card at a time
            if (this.currentIndex < maxIndex) {
                this.currentIndex++;
                this.updateSlider();
            }
        } else {
            // Desktop: Move by itemsPerView
            const remainingItems = this.totalCards - this.currentIndex - this.itemsPerView;
            
            if (remainingItems > 0) {
                const itemsToMove = Math.min(this.itemsPerView, remainingItems);
                this.currentIndex = Math.min(maxIndex, this.currentIndex + itemsToMove);
                this.updateSlider();
            }
        }
    }

    prev() {
        if (this.isAnimating) return;
        
        // Close expanded card when navigating
        if (this.expandedCard) {
            this.closeCard();
            return; // Let the close animation complete first
        }
        
        if (this.isMobile) {
            // Mobile: Move one card at a time
            if (this.currentIndex > 0) {
                this.currentIndex--;
                this.updateSlider();
            }
        } else {
            // Desktop: Move by itemsPerView
            if (this.currentIndex > 0) {
                const itemsToMove = Math.min(this.itemsPerView, this.currentIndex);
                this.currentIndex = Math.max(0, this.currentIndex - itemsToMove);
                this.updateSlider();
            }
        }
    }

    updateSlider() {
        if (!this.itemWidth) {
            return;
        }
        
        const translateX = -(this.currentIndex * (this.itemWidth + this.gap));
        this.slider.style.transform = 'translateX(' + translateX + 'px)';
        this.updateButtonStates();
    }

    updateButtonStates() {
        if (!this.prevBtn || !this.nextBtn) return;
        
        const maxIndex = Math.max(0, this.totalCards - this.itemsPerView);
        
        // Update prev button
        if (this.currentIndex === 0) {
            this.prevBtn.classList.add('disabled');
            this.prevBtn.disabled = true;
        } else {
            this.prevBtn.classList.remove('disabled');
            this.prevBtn.disabled = false;
        }
        
        // Update next button
        if (this.currentIndex >= maxIndex) {
            this.nextBtn.classList.add('disabled');
            this.nextBtn.disabled = true;
        } else {
            this.nextBtn.classList.remove('disabled');
            this.nextBtn.disabled = false;
        }
    }
}

function initExpandableCardSliders() {
    const sliders = document.querySelectorAll('[data-expandable-slider]');
    sliders.forEach(slider => new ExpandableCardSlider(slider));
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initExpandableCardSliders);
} else {
    initExpandableCardSliders();
}