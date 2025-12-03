// Beity Section Interactions

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

// Event listeners
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        animateCards();
        animateTitles();
        animateImages();
    }, 500);

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
});
