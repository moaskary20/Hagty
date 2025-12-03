// Forasy Section Interactions

// Define colors object
const colors = {
    primary: '#A15DBF',
    secondary: '#8B4A9C',
    accent1: '#ffffff',
    accent2: '#E6A0C3',
    accent3: '#B17DC0',
    accent4: '#E6DAC8',
    accent5: '#753880'
};

// Animation functions
function animateCards() {
    const cards = document.querySelectorAll('.bg-\\[\\#ffffff\\], .bg-\\[\\#E6DAC8\\], .bg-\\[\\#E6A0C3\\]');
    cards.forEach((card, index) => {
        setTimeout(() => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.6s ease';
            
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100);
        }, index * 100);
    });
}

function animateStats() {
    const statsCards = document.querySelectorAll('.grid.grid-cols-2.md\\:grid-cols-4 > div');
    statsCards.forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('animate-bounceIn');
        }, index * 200);
    });
}

function animateTitles() {
    const titles = document.querySelectorAll('h1, h2, h3');
    titles.forEach((title, index) => {
        setTimeout(() => {
            title.classList.add('animate-fadeInUp');
        }, index * 150);
    });
}

function animateImages() {
    const images = document.querySelectorAll('img');
    images.forEach((img, index) => {
        setTimeout(() => {
            img.style.opacity = '0';
            img.style.transform = 'scale(0.8)';
            img.style.transition = 'all 0.6s ease';
            
            setTimeout(() => {
                img.style.opacity = '1';
                img.style.transform = 'scale(1)';
            }, 200);
        }, index * 100);
    });
}

function animateButtons() {
    const buttons = document.querySelectorAll('button, .btn, a[class*="bg-gradient"]');
    buttons.forEach((btn, index) => {
        setTimeout(() => {
            btn.classList.add('animate-slideInRight');
        }, index * 100);
    });
}

function animateInteractiveElements() {
    // Animate form elements
    const formElements = document.querySelectorAll('input, select, textarea');
    formElements.forEach((element, index) => {
        setTimeout(() => {
            element.style.opacity = '0';
            element.style.transform = 'translateX(-20px)';
            element.style.transition = 'all 0.5s ease';
            
            setTimeout(() => {
                element.style.opacity = '1';
                element.style.transform = 'translateX(0)';
            }, 100);
        }, index * 80);
    });
}

function animateTexts() {
    const texts = document.querySelectorAll('p, span, div:not([class*="bg-"])');
    texts.forEach((text, index) => {
        if (!text.querySelector('img, button, input, select')) {
            setTimeout(() => {
                text.style.opacity = '0';
                text.style.transform = 'translateY(10px)';
                text.style.transition = 'all 0.4s ease';
                
                setTimeout(() => {
                    text.style.opacity = '1';
                    text.style.transform = 'translateY(0)';
                }, 50);
            }, index * 50);
        }
    });
}

function animateSections() {
    const sections = document.querySelectorAll('section');
    sections.forEach((section, index) => {
        setTimeout(() => {
            section.style.opacity = '0';
            section.style.transform = 'translateY(30px)';
            section.style.transition = 'all 0.8s ease';
            
            setTimeout(() => {
                section.style.opacity = '1';
                section.style.transform = 'translateY(0)';
            }, 200);
        }, index * 300);
    });
}

function animateSpecificElements() {
    // Animate forasy-specific elements
    const forasyCards = document.querySelectorAll('.forasy-card, .job-card');
    forasyCards.forEach((card, index) => {
        setTimeout(() => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px) scale(0.95)';
            card.style.transition = 'all 0.6s ease';
            
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0) scale(1)';
            }, 150);
        }, index * 120);
    });

    // Animate forasy icons
    const forasyIcons = document.querySelectorAll('.forasy-icon, .fas, .fa');
    forasyIcons.forEach((icon, index) => {
        setTimeout(() => {
            icon.style.opacity = '0';
            icon.style.transform = 'rotate(-10deg) scale(0.8)';
            icon.style.transition = 'all 0.5s ease';
            
            setTimeout(() => {
                icon.style.opacity = '1';
                icon.style.transform = 'rotate(0deg) scale(1)';
            }, 100);
        }, index * 80);
    });
}

// Event listeners
document.addEventListener('DOMContentLoaded', function() {
    // Initial animations
    setTimeout(() => {
        animateCards();
        animateStats();
        animateTitles();
        animateImages();
        animateButtons();
        animateInteractiveElements();
        animateTexts();
        animateSections();
        animateSpecificElements();
    }, 500);

    // Scroll animations
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const parallax = document.querySelectorAll('.parallax');
        
        parallax.forEach(element => {
            const speed = element.dataset.speed || 0.5;
            element.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });

    // Hover effects for cards
    const cards = document.querySelectorAll('.bg-\\[\\#ffffff\\], .bg-\\[\\#E6DAC8\\], .bg-\\[\\#E6A0C3\\]');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px) scale(1.02)';
            this.style.boxShadow = '0 10px 25px rgba(161, 93, 191, 0.3)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '';
        });
    });

    // Click animations
    document.addEventListener('click', function(e) {
        if (e.target.matches('button, .btn, a[class*="bg-gradient"]')) {
            e.target.style.transform = 'scale(0.95)';
            setTimeout(() => {
                e.target.style.transform = 'scale(1)';
            }, 150);
        }
    });
});

// Resize handler
window.addEventListener('resize', function() {
    // Recalculate animations on resize
    setTimeout(() => {
        animateCards();
        animateStats();
    }, 300);
});
