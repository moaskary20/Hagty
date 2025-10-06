// Enhanced Admin Login Page Interactions

document.addEventListener('DOMContentLoaded', function() {
    // Add floating animation to login card
    const loginCard = document.querySelector('.fi-simple-main');
    if (loginCard) {
        loginCard.style.transition = 'all 0.3s ease';
        
        // Add hover effect
        loginCard.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 35px 60px rgba(0, 0, 0, 0.3)';
        });
        
        loginCard.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 25px 50px rgba(0, 0, 0, 0.25)';
        });
    }
    
    // Enhance input focus effects
    const inputs = document.querySelectorAll('.fi-fo-text-input input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            const container = this.closest('.fi-fo-text-input');
            if (container) {
                container.style.transform = 'scale(1.02)';
            }
        });
        
        input.addEventListener('blur', function() {
            const container = this.closest('.fi-fo-text-input');
            if (container) {
                container.style.transform = 'scale(1)';
            }
        });
    });
    
    // Add button click effect
    const submitButton = document.querySelector('.fi-btn');
    if (submitButton) {
        submitButton.addEventListener('click', function(e) {
            // Create ripple effect
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(255, 255, 255, 0.3)';
            ripple.style.transform = 'scale(0)';
            ripple.style.animation = 'ripple 0.6s linear';
            ripple.style.pointerEvents = 'none';
            
            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    }
    
    // Add CSS for ripple animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        .fi-btn {
            position: relative;
            overflow: hidden;
        }
        
        .fi-fo-text-input {
            transition: transform 0.2s ease;
        }
        
        .floating-element {
            animation: float 6s ease-in-out infinite;
        }
    `;
    document.head.appendChild(style);
    
    // Add floating elements
    createFloatingElements();
});

function createFloatingElements() {
    const container = document.body;
    
    // Create floating hearts
    for (let i = 0; i < 3; i++) {
        const heart = document.createElement('div');
        heart.innerHTML = '💜';
        heart.style.position = 'fixed';
        heart.style.fontSize = '20px';
        heart.style.opacity = '0.1';
        heart.style.pointerEvents = 'none';
        heart.style.zIndex = '1';
        heart.style.animation = 'float 8s ease-in-out infinite';
        heart.style.animationDelay = (i * 2) + 's';
        
        // Random position
        heart.style.left = Math.random() * 100 + '%';
        heart.style.top = Math.random() * 100 + '%';
        
        container.appendChild(heart);
    }
}
