class CardScroll {
    constructor(section) {
        this.section = section;
        this.slider = section.querySelector('[data-cards-slider]');
        
        if (!this.slider) return;
        
        this.cards = Array.from(this.slider.children);
        this.totalCards = this.cards.length;
        this.ticking = false;
        this.isActive = false;
        this.breakpoint = 1024; // Matches $breakpoint__large
        
        this.init();
    }

    init() {
        this.handleMode();
        this.bindEvents();
    }

    handleMode() {
        this.isActive = window.innerWidth >= this.breakpoint;

        if (this.isActive) {
            this.calculateDimensions();
        } else {
            // Mobile/tablet: reset all inline styles
            this.section.style.height = '';
            this.slider.style.transform = '';
            this.slider.style.willChange = '';
        }
    }

    calculateDimensions() {
        if (!this.isActive) return;

        const sliderStyle = window.getComputedStyle(this.slider);
        this.gap = parseInt(sliderStyle.gap) || 38;
        
        let totalCardsWidth = 0;
        this.cards.forEach((card) => {
            totalCardsWidth += card.offsetWidth;
        });
        totalCardsWidth += this.gap * (this.totalCards - 1);
        
        const body = this.section.querySelector('.cards-scroll__body');
        const bodyStyle = window.getComputedStyle(body);
        const paddingLeft = parseInt(bodyStyle.paddingLeft) || 0;
        this.viewportWidth = (body ? body.offsetWidth : window.innerWidth) - paddingLeft;
        
        this.maxTranslate = Math.max(0, totalCardsWidth - this.viewportWidth + this.gap);
        
        this.scrollDistance = this.maxTranslate;
        this.section.style.height = (window.innerHeight + this.scrollDistance) + 'px';
    }

    bindEvents() {
        window.addEventListener('scroll', () => {
            if (!this.isActive) return;
            if (!this.ticking) {
                requestAnimationFrame(() => {
                    this.onScroll();
                    this.ticking = false;
                });
                this.ticking = true;
            }
        }, { passive: true });

        window.addEventListener('resize', () => {
            this.handleMode();
            if (this.isActive) {
                this.onScroll();
            }
        });
    }

    onScroll() {
        if (!this.isActive) return;

        const rect = this.section.getBoundingClientRect();
        const sectionTop = rect.top;
        const sectionHeight = rect.height;
        const viewportHeight = window.innerHeight;
        
        const scrollableDistance = sectionHeight - viewportHeight;
        
        if (scrollableDistance <= 0) {
            this.slider.style.transform = 'translateX(0px)';
            return;
        }
        
        const scrolled = -sectionTop;
        const progress = Math.max(0, Math.min(1, scrolled / scrollableDistance));
        
        const translateX = -(progress * this.maxTranslate);
        this.slider.style.transform = 'translateX(' + translateX + 'px)';
    }
}

function initCardScroll() {
    const sections = document.querySelectorAll('[data-cards-scroll]');
    sections.forEach(section => new CardScroll(section));
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCardScroll);
} else {
    initCardScroll();
}