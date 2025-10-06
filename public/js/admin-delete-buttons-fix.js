// Admin Panel Delete Buttons Fix JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Fix delete buttons functionality
    function fixDeleteButtons() {
        // Find all delete buttons with multiple selectors
        const deleteButtons = document.querySelectorAll(`
            [data-action="delete"], 
            [data-action="delete-bulk"], 
            .fi-ac-action-delete, 
            .fi-ac-action-delete-bulk,
            .fi-ac-action-delete button,
            .fi-ac-action-delete-bulk button,
            button[data-action="delete"],
            button[data-action="delete-bulk"],
            .fi-ta-actions .fi-ac-action-delete,
            .fi-ta-bulk-actions .fi-ac-action-delete-bulk
        `);
        
        if (deleteButtons.length > 0) {
            console.log('Found delete buttons:', deleteButtons.length);
        }
        
        deleteButtons.forEach(button => {
            // Force enable the button
            button.style.pointerEvents = 'auto';
            button.style.cursor = 'pointer';
            button.style.opacity = '1';
            button.style.visibility = 'visible';
            button.style.display = 'inline-flex';
            button.style.zIndex = '999';
            button.style.position = 'relative';
            
            // Remove any disabled attributes
            button.removeAttribute('disabled');
            button.disabled = false;
            
            // Remove any classes that might disable the button
            button.classList.remove('disabled', 'opacity-50', 'pointer-events-none');
            
            // Add click event listener if not present
            if (!button.hasAttribute('data-fixed')) {
                button.addEventListener('click', function(e) {
                    // Prevent any event bubbling that might interfere
                    e.stopPropagation();
                    
                    // Let the default action proceed after a small delay
                    setTimeout(() => {
                        // Default action will proceed
                    }, 100);
                });
                
                button.setAttribute('data-fixed', 'true');
            }
        });
        
        // Fix delete icons specifically
        const deleteIcons = document.querySelectorAll('.fi-ac-action-delete .fi-icon, .fi-ac-action-delete-bulk .fi-icon');
        deleteIcons.forEach(icon => {
            icon.style.pointerEvents = 'auto';
            icon.style.cursor = 'pointer';
            icon.style.display = 'block';
        });
        
        // Fix any nested buttons
        const nestedButtons = document.querySelectorAll('.fi-ac-action-delete button, .fi-ac-action-delete-bulk button');
        nestedButtons.forEach(button => {
            button.style.pointerEvents = 'auto';
            button.style.cursor = 'pointer';
            button.style.opacity = '1';
            button.style.visibility = 'visible';
            button.removeAttribute('disabled');
            button.disabled = false;
        });
    }
    
    // Run fix immediately
    fixDeleteButtons();
    
    // Run fix when new content is loaded (for dynamic content)
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
                setTimeout(fixDeleteButtons, 100);
            }
        });
    });
    
    // Start observing
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
    
    // Fix delete buttons on page navigation
    document.addEventListener('livewire:navigated', fixDeleteButtons);
    document.addEventListener('livewire:updated', fixDeleteButtons);
    
    // Fix delete buttons on form submissions
    document.addEventListener('livewire:submitted', fixDeleteButtons);
});

// Additional fix for Filament specific issues
window.addEventListener('load', function() {
    // Fix delete buttons after page load
    setTimeout(function() {
        const deleteButtons = document.querySelectorAll('[data-action="delete"], [data-action="delete-bulk"]');
        deleteButtons.forEach(button => {
            button.style.pointerEvents = 'auto';
            button.style.cursor = 'pointer';
            button.removeAttribute('disabled');
        });
    }, 1000);
});
