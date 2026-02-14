class CardScroll {
    constructor(container) {
        this.container = container;
        this.slider = container.querySelector('[data-cards-slider]');
        this.modal = document.querySelector('[data-card-modal]');
        
        if (!this.slider) return;
        
        this.currentIndex = 0;
        this.cards = Array.from(this.slider.children);
        this.totalCards = this.cards.length;

        this.prevBtn = container.querySelector('[data-prev-btn]');
        this.nextBtn = container.querySelector('[data-next-btn]');
        
        this.init();
    }

    init() {
        this.calculateDimensions();
        this.bindEvents();
        this.setupMobileModals();
        this.updateButtonStates();
    }

    calculateDimensions() {
        this.isMobile = window.innerWidth < 820;
        this.isTablet = window.innerWidth >= 820 && window.innerWidth < 1024;
        this.itemsPerView = this.isMobile ? 1 : 3;
        
        if (this.cards.length > 0) {
            if (this.isMobile) {
                this.itemWidth = 300;
                this.gap = 16;
            } else {
                const firstCard = this.cards[0];
                if (firstCard) {
                    this.itemWidth = firstCard.offsetWidth;
                    const cardsStyle = window.getComputedStyle(this.slider);
                    this.gap = parseInt(cardsStyle.gap) || 38;
                }
            }
        }
    }

    setupMobileModals() {
        this.cards.forEach((card) => {
            const triggerBtn = card.querySelector('[data-open-modal]');
            
            if (triggerBtn) {
                triggerBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    if (this.isMobile) {
                        this.openMobileModal(card);
                    }
                });
            }
        });
    }

    openMobileModal(card) {
        if (!this.modal) return;
        
        const headingElement = card.querySelector('.card__heading');
        const title = headingElement ? headingElement.textContent : '';
        
        const bgImage = card.style.getPropertyValue('--bg-image');
        
        const descriptionElement = card.querySelector('.card__description');
        const description = descriptionElement ? descriptionElement.innerHTML : '';
        
        const link = card.querySelector('.card__link');
        
        // Populate modal
        const modalTitle = this.modal.querySelector('[data-modal-title]');
        const modalDescription = this.modal.querySelector('[data-modal-description]');
        const modalLink = this.modal.querySelector('[data-modal-link]');
        const modalContent = this.modal.querySelector('.card-modal__content');
        
        if (modalTitle) modalTitle.textContent = title;
        
        // Handle image vs no-image modal variant
        if (bgImage && modalContent) {
            modalContent.style.setProperty('--bg-image', bgImage);
            modalContent.classList.remove('card-modal__content--no-image');
        } else if (modalContent) {
            modalContent.style.removeProperty('--bg-image');
            modalContent.classList.add('card-modal__content--no-image');
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
        
        // Show modal
        this.modal.classList.add('active');
        document.body.style.overflow = 'hidden';
        
        this.setupModalClose();
    }

    setupModalClose() {
        if (!this.modal) return;
        
        const closeBtn = this.modal.querySelector('[data-modal-close]');
        
        const closeModal = () => {
            this.modal.classList.remove('active');
            document.body.style.overflow = '';
        };
        
        if (closeBtn) {
            closeBtn.addEventListener('click', closeModal, { once: true });
        }
        
        this.modal.addEventListener('click', (e) => {
            if (e.target === this.modal) {
                closeModal();
            }
        }, { once: true });
        
        const handleEscape = (e) => {
            if (e.key === 'Escape') {
                closeModal();
                document.removeEventListener('keydown', handleEscape);
            }
        };
        document.addEventListener('keydown', handleEscape);
    }

    bindEvents() {
        window.addEventListener('resize', () => this.handleResize());

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
        
        // Close mobile modal if switching to tablet/desktop
        if (wasMobile && !this.isMobile && this.modal && this.modal.classList.contains('active')) {
            this.modal.classList.remove('active');
            document.body.style.overflow = '';
        }
        
        if (wasMobile !== this.isMobile) {
            this.currentIndex = 0;
        }

        this.updateSlider();
        this.updateButtonStates();
    }

    next() {
        const maxIndex = Math.max(0, this.totalCards - this.itemsPerView);
        
        if (this.isMobile) {
            if (this.currentIndex < maxIndex) {
                this.currentIndex++;
                this.updateSlider();
            }
        } else {
            const remainingItems = this.totalCards - this.currentIndex - this.itemsPerView;
            
            if (remainingItems > 0) {
                const itemsToMove = Math.min(this.itemsPerView, remainingItems);
                this.currentIndex = Math.min(maxIndex, this.currentIndex + itemsToMove);
                this.updateSlider();
            }
        }
    }

    prev() {
        if (this.isMobile) {
            if (this.currentIndex > 0) {
                this.currentIndex--;
                this.updateSlider();
            }
        } else {
            if (this.currentIndex > 0) {
                const itemsToMove = Math.min(this.itemsPerView, this.currentIndex);
                this.currentIndex = Math.max(0, this.currentIndex - itemsToMove);
                this.updateSlider();
            }
        }
    }

    updateSlider() {
        if (!this.itemWidth) return;
        
        const translateX = -(this.currentIndex * (this.itemWidth + this.gap));
        this.slider.style.transform = 'translateX(' + translateX + 'px)';
        this.updateButtonStates();
    }

    updateButtonStates() {
        if (!this.prevBtn || !this.nextBtn) return;
        
        const maxIndex = Math.max(0, this.totalCards - this.itemsPerView);
        
        if (this.currentIndex === 0) {
            this.prevBtn.classList.add('disabled');
            this.prevBtn.disabled = true;
        } else {
            this.prevBtn.classList.remove('disabled');
            this.prevBtn.disabled = false;
        }
        
        if (this.currentIndex >= maxIndex) {
            this.nextBtn.classList.add('disabled');
            this.nextBtn.disabled = true;
        } else {
            this.nextBtn.classList.remove('disabled');
            this.nextBtn.disabled = false;
        }
    }
}

function initCardScroll() {
    const sliders = document.querySelectorAll('[data-cards-scroll]');
    sliders.forEach(slider => new CardScroll(slider));
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCardScroll);
} else {
    initCardScroll();
}