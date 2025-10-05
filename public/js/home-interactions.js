// Home Page Interactions

// Define colors object
const colors = {
    primary: '#A15DBF',
    secondary: '#8B4A9C',
    accent1: '#FAD6E0',
    accent2: '#E6A0C3',
    accent3: '#B17DC0',
    accent4: '#E6DAC8',
    accent5: '#753880'
};

// Animation functions
function animateCards() {
    const cards = document.querySelectorAll('.bg-\\[\\#FAD6E0\\], .bg-\\[\\#E6DAC8\\], .bg-\\[\\#E6A0C3\\]');
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
    const buttons = document.querySelectorAll('.bg-gradient-to-r.from-\\[\\#A15DBF\\].to-\\[\\#8B4A9C\\]');
    buttons.forEach((button, index) => {
        setTimeout(() => {
            button.classList.add('animate-bounceIn');
        }, index * 100);
    });
}

function animateFloatingElements() {
    const floatingElements = document.querySelectorAll('.floating-element');
    floatingElements.forEach((element, index) => {
        setTimeout(() => {
            element.style.opacity = '0';
            element.style.transform = 'translateY(20px)';
            element.style.transition = 'all 0.8s ease';
            
            setTimeout(() => {
                element.style.opacity = '0.6';
                element.style.transform = 'translateY(0)';
            }, 200);
        }, index * 200);
    });
}

// Event listeners
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        animateCards();
        animateTitles();
        animateImages();
        animateButtons();
        animateFloatingElements();
    }, 500);

    // Hover effects for cards
    const cards = document.querySelectorAll('.bg-\\[\\#FAD6E0\\], .bg-\\[\\#E6DAC8\\], .bg-\\[\\#E6A0C3\\]');
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

    // Enhanced button hover effects
    const buttons = document.querySelectorAll('.bg-gradient-to-r.from-\\[\\#A15DBF\\].to-\\[\\#8B4A9C\\]');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px) scale(1.05)';
            this.style.boxShadow = '0 15px 35px rgba(161, 93, 191, 0.6)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '';
        });
    });

    // Floating elements animation
    const floatingElements = document.querySelectorAll('.floating-element');
    floatingElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.2) rotate(10deg)';
            this.style.transition = 'all 0.3s ease';
        });
        
        element.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
        });
    });
});
