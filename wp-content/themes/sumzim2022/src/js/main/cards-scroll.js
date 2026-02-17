class CardScroll {
    constructor(section) {
        this.section = section;
        this.slider = section.querySelector('[data-cards-slider]');
        
        if (!this.slider) return;
        
        this.cards = Array.from(this.slider.children);
        this.totalCards = this.cards.length;
        this.ticking = false;
        
        this.init();
    }

    init() {
        this.calculateDimensions();
        this.bindEvents();
    }

    calculateDimensions() {
        const isMobile = window.innerWidth < 820;
        
        // Get the total width of all cards + gaps
        const sliderStyle = window.getComputedStyle(this.slider);
        this.gap = parseInt(sliderStyle.gap) || (isMobile ? 16 : 38);
        
        // Calculate total scrollable width
        let totalCardsWidth = 0;
        this.cards.forEach((card) => {
            totalCardsWidth += card.offsetWidth;
        });
        totalCardsWidth += this.gap * (this.totalCards - 1);
        
        // The visible area: full viewport minus the left padding offset
        const body = this.section.querySelector('.cards-scroll__body');
        const bodyStyle = window.getComputedStyle(body);
        const paddingLeft = parseInt(bodyStyle.paddingLeft) || 0;
        this.viewportWidth = (body ? body.offsetWidth : window.innerWidth) - paddingLeft;
        
        // How far the cards need to translate:
        // total card width - visible area + one gap of right padding to match card spacing
        this.maxTranslate = Math.max(0, totalCardsWidth - this.viewportWidth + this.gap);
        
        // Set the section height to create scroll runway
        // viewport height + the distance we need to scroll horizontally
        const runwayMultiplier = 1;
        this.scrollDistance = this.maxTranslate * runwayMultiplier;
        this.section.style.height = (window.innerHeight + this.scrollDistance) + 'px';
    }

    bindEvents() {
        window.addEventListener('scroll', () => {
            if (!this.ticking) {
                requestAnimationFrame(() => {
                    this.onScroll();
                    this.ticking = false;
                });
                this.ticking = true;
            }
        }, { passive: true });

        window.addEventListener('resize', () => {
            this.calculateDimensions();
            this.onScroll();
        });
    }

    onScroll() {
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