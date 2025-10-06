// Admin Panel Delete Buttons Ultimate Fix JavaScript
console.log('🔧 Loading delete buttons fix...');

// Wait for DOM to be ready
document.addEventListener('DOMContentLoaded', function() {
    console.log('🔧 DOM loaded, starting delete buttons fix...');
    
    // Ultimate delete button fix function
    function ultimateDeleteButtonFix() {
        console.log('🔧 Running ultimate delete button fix...');
        
        // Find ALL possible delete button selectors
        const deleteSelectors = [
            '[data-action="delete"]',
            '[data-action="delete-bulk"]',
            '.fi-ac-action-delete',
            '.fi-ac-action-delete-bulk',
            '.fi-ta-action-delete',
            '.fi-ta-action-delete-bulk',
            '.fi-ac-action-delete button',
            '.fi-ac-action-delete-bulk button',
            'button[data-action="delete"]',
            'button[data-action="delete-bulk"]',
            '.fi-ac-action-delete .fi-icon',
            '.fi-ac-action-delete-bulk .fi-icon',
            '.fi-ta-actions .fi-ac-action-delete',
            '.fi-ta-bulk-actions .fi-ac-action-delete-bulk'
        ];
        
        let totalButtons = 0;
        let fixedButtons = 0;
        
        // Process each selector
        deleteSelectors.forEach(selector => {
            const buttons = document.querySelectorAll(selector);
            totalButtons += buttons.length;
            
            buttons.forEach(button => {
                // Force enable the button
                button.style.pointerEvents = 'auto';
                button.style.cursor = 'pointer';
                button.style.opacity = '1';
                button.style.visibility = 'visible';
                button.style.display = 'inline-flex';
                button.style.zIndex = '9999';
                button.style.position = 'relative';
                
                // Remove disabled attributes
                button.removeAttribute('disabled');
                button.disabled = false;
                
                // Remove classes that might disable
                button.classList.remove('disabled', 'opacity-50', 'pointer-events-none', 'cursor-not-allowed');
                
                // Add click event if not already fixed
                if (!button.hasAttribute('data-ultimate-fixed')) {
                    button.addEventListener('click', function(e) {
                        console.log('🗑️ Delete button clicked:', button);
                        console.log('🗑️ Button selector:', selector);
                        console.log('🗑️ Button classes:', button.className);
                        console.log('🗑️ Button data-action:', button.getAttribute('data-action'));
                        
                        // Don't prevent default - let Filament handle it
                        // e.stopPropagation();
                        // e.preventDefault();
                    });
                    
                    button.setAttribute('data-ultimate-fixed', 'true');
                    fixedButtons++;
                }
                
                // Fix any nested elements
                const nestedButtons = button.querySelectorAll('button, .fi-icon, svg, i');
                nestedButtons.forEach(nested => {
                    nested.style.pointerEvents = 'auto';
                    nested.style.cursor = 'pointer';
                    nested.removeAttribute('disabled');
                    nested.disabled = false;
                });
            });
        });
        
        if (totalButtons > 0) {
            console.log(`🔧 Found ${totalButtons} delete buttons, fixed ${fixedButtons} new buttons`);
        }
        
        // Also fix any buttons that might be dynamically added
        const allButtons = document.querySelectorAll('button, [role="button"], .cursor-pointer');
        allButtons.forEach(button => {
            const text = button.textContent?.toLowerCase() || '';
            const title = button.title?.toLowerCase() || '';
            const classes = button.className?.toLowerCase() || '';
            
            if (text.includes('delete') || text.includes('حذف') || 
                title.includes('delete') || title.includes('حذف') ||
                classes.includes('delete') || button.getAttribute('data-action') === 'delete') {
                
                button.style.pointerEvents = 'auto';
                button.style.cursor = 'pointer';
                button.removeAttribute('disabled');
                button.disabled = false;
            }
        });
    }
    
    // Run fix immediately
    ultimateDeleteButtonFix();
    
    // Run fix every second for 10 seconds to catch dynamic content
    let fixAttempts = 0;
    const fixInterval = setInterval(() => {
        ultimateDeleteButtonFix();
        fixAttempts++;
        
        if (fixAttempts >= 5) {
            clearInterval(fixInterval);
            console.log('🔧 Delete button fix completed after 5 attempts');
        }
    }, 1000);
    
    // Run fix when content changes
    const observer = new MutationObserver(function(mutations) {
        let shouldFix = false;
        
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
                // Check if any added nodes contain delete buttons
                mutation.addedNodes.forEach(node => {
                    if (node.nodeType === Node.ELEMENT_NODE) {
                        if (node.querySelector && (
                            node.querySelector('[data-action="delete"]') ||
                            node.querySelector('.fi-ac-action-delete') ||
                            node.querySelector('button')
                        )) {
                            shouldFix = true;
                        }
                    }
                });
            }
        });
        
        if (shouldFix) {
            setTimeout(ultimateDeleteButtonFix, 100);
        }
    });
    
    // Start observing
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
    
    // Fix on Livewire events
    document.addEventListener('livewire:navigated', function() {
        setTimeout(ultimateDeleteButtonFix, 500);
    });
    
    document.addEventListener('livewire:updated', function() {
        setTimeout(ultimateDeleteButtonFix, 500);
    });
    
    // Fix on page load
    window.addEventListener('load', function() {
        setTimeout(ultimateDeleteButtonFix, 1000);
    });
    
    // Fix on focus events (when user interacts with page)
    document.addEventListener('focusin', function() {
        setTimeout(ultimateDeleteButtonFix, 100);
    });
    
    console.log('🔧 Delete button fix setup completed');
});

// Also run fix when script loads (for cases where DOM is already ready)
if (document.readyState === 'loading') {
    // DOM is still loading, wait for it
} else {
    // DOM is already ready
    console.log('🔧 DOM already ready, running delete button fix immediately...');
    setTimeout(() => {
        const buttons = document.querySelectorAll('[data-action="delete"], .fi-ac-action-delete, button');
        buttons.forEach(button => {
            button.style.pointerEvents = 'auto';
            button.style.cursor = 'pointer';
            button.removeAttribute('disabled');
            button.disabled = false;
        });
        console.log(`🔧 Fixed ${buttons.length} buttons on immediate load`);
    }, 100);
}
