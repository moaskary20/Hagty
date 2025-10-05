// Admin Sidebar Interactions - تفاعلات القائمة الجانبية للإدارة

document.addEventListener('DOMContentLoaded', function() {
    // تحسينات القائمة الجانبية
    
    // إضافة تأثيرات تفاعلية للعناصر
    const sidebarItems = document.querySelectorAll('.fi-sidebar-nav-item');
    
    sidebarItems.forEach((item, index) => {
        // تأثيرات عند التحميل
        item.style.opacity = '0';
        item.style.transform = 'translateX(-50px)';
        
        setTimeout(() => {
            item.style.transition = 'all 0.5s ease-out';
            item.style.opacity = '1';
            item.style.transform = 'translateX(0)';
        }, index * 100);
        
        // تأثيرات عند التمرير
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px) scale(1.02)';
            this.style.boxShadow = '0 4px 15px rgba(0, 0, 0, 0.2)';
            
            // تأثير الموجة
            const ripple = document.createElement('div');
            ripple.style.cssText = `
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                transform: translate(-50%, -50%);
                animation: rippleEffect 0.6s ease-out;
                pointer-events: none;
                z-index: 1;
            `;
            
            this.style.position = 'relative';
            this.appendChild(ripple);
            
            setTimeout(() => {
                if (ripple.parentNode) {
                    ripple.parentNode.removeChild(ripple);
                }
            }, 600);
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0) scale(1)';
            this.style.boxShadow = '0 2px 8px rgba(0, 0, 0, 0.1)';
        });
        
        // تأثيرات عند النقر
        item.addEventListener('click', function() {
            this.style.transform = 'translateX(8px) scale(1.05)';
            this.style.boxShadow = '0 6px 20px rgba(0, 0, 0, 0.3)';
            
            setTimeout(() => {
                this.style.transform = 'translateX(5px) scale(1.02)';
                this.style.boxShadow = '0 4px 15px rgba(0, 0, 0, 0.2)';
            }, 200);
        });
    });
    
    // تحسينات الأيقونات
    const icons = document.querySelectorAll('.fi-sidebar-nav-item-icon, .fi-icon');
    
    icons.forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.2) rotate(10deg)';
            this.style.color = 'white';
            this.style.textShadow = '0 2px 4px rgba(0, 0, 0, 0.3)';
        });
        
        icon.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
            this.style.color = 'rgba(255, 255, 255, 0.9)';
            this.style.textShadow = 'none';
        });
    });
    
    // تحسينات المجموعات
    const groups = document.querySelectorAll('.fi-sidebar-nav-group');
    
    groups.forEach(group => {
        const groupLabel = group.querySelector('.fi-sidebar-nav-group-label');
        
        if (groupLabel) {
            groupLabel.addEventListener('click', function() {
                const subItems = group.querySelectorAll('.fi-sidebar-nav-sub-item');
                
                subItems.forEach(subItem => {
                    if (subItem.style.display === 'none' || subItem.style.display === '') {
                        subItem.style.display = 'block';
                        subItem.style.animation = 'slideInFromLeft 0.3s ease-out';
                    } else {
                        subItem.style.display = 'none';
                    }
                });
            });
        }
    });
    
    // تحسينات القائمة المطوية
    const collapseButton = document.querySelector('.fi-sidebar-collapse-button');
    const sidebar = document.querySelector('.fi-sidebar');
    
    if (collapseButton && sidebar) {
        collapseButton.addEventListener('click', function() {
            if (sidebar.classList.contains('fi-sidebar-collapsed')) {
                // توسيع القائمة
                sidebar.classList.remove('fi-sidebar-collapsed');
                sidebar.style.width = '280px';
                
                const items = sidebar.querySelectorAll('.fi-sidebar-nav-item');
                items.forEach((item, index) => {
                    setTimeout(() => {
                        item.style.animation = 'slideInFromLeft 0.3s ease-out';
                    }, index * 50);
                });
            } else {
                // طي القائمة
                sidebar.classList.add('fi-sidebar-collapsed');
                sidebar.style.width = '80px';
                
                const items = sidebar.querySelectorAll('.fi-sidebar-nav-item');
                items.forEach((item, index) => {
                    setTimeout(() => {
                        item.style.animation = 'slideInFromLeft 0.3s ease-out';
                    }, index * 50);
                });
            }
        });
    }
    
    // تحسينات التمرير
    const sidebarNav = document.querySelector('.fi-sidebar-nav');
    
    if (sidebarNav) {
        sidebarNav.addEventListener('scroll', function() {
            const scrollTop = this.scrollTop;
            const scrollHeight = this.scrollHeight;
            const clientHeight = this.clientHeight;
            
            // تأثير التمرير
            if (scrollTop > 0) {
                this.style.boxShadow = 'inset 0 2px 4px rgba(0, 0, 0, 0.1)';
            } else {
                this.style.boxShadow = 'none';
            }
            
            // تأثير النهاية
            if (scrollTop + clientHeight >= scrollHeight - 10) {
                this.style.boxShadow = 'inset 0 -2px 4px rgba(0, 0, 0, 0.1)';
            }
        });
    }
    
    // تحسينات الشعار
    const brandLogo = document.querySelector('.fi-sidebar-brand-logo');
    
    if (brandLogo) {
        brandLogo.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) rotate(5deg)';
            this.style.filter = 'brightness(1.4) drop-shadow(0 4px 8px rgba(0, 0, 0, 0.4))';
        });
        
        brandLogo.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
            this.style.filter = 'brightness(1.2) drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3))';
        });
    }
    
    // تحسينات العنصر النشط
    const activeItem = document.querySelector('.fi-sidebar-nav-item.fi-active, .fi-sidebar-nav-item[aria-current="page"]');
    
    if (activeItem) {
        activeItem.style.background = 'linear-gradient(135deg, rgba(255, 255, 255, 0.3) 0%, rgba(255, 255, 255, 0.2) 100%)';
        activeItem.style.borderLeft = '4px solid white';
        activeItem.style.boxShadow = '0 6px 20px rgba(0, 0, 0, 0.3)';
        activeItem.style.transform = 'translateX(8px) scale(1.05)';
        
        // تأثير الموجة المستمر
        setInterval(() => {
            const ripple = document.createElement('div');
            ripple.style.cssText = `
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.2);
                transform: translate(-50%, -50%);
                animation: rippleEffect 2s ease-in-out infinite;
                pointer-events: none;
                z-index: 1;
            `;
            
            activeItem.style.position = 'relative';
            activeItem.appendChild(ripple);
            
            setTimeout(() => {
                if (ripple.parentNode) {
                    ripple.parentNode.removeChild(ripple);
                }
            }, 2000);
        }, 3000);
    }
    
    // تحسينات البحث في القائمة
    const searchInput = document.querySelector('.fi-sidebar-search input');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const items = document.querySelectorAll('.fi-sidebar-nav-item');
            
            items.forEach(item => {
                const label = item.querySelector('.fi-sidebar-nav-item-label, .fi-sidebar-nav-item-text');
                
                if (label) {
                    const text = label.textContent.toLowerCase();
                    
                    if (text.includes(searchTerm)) {
                        item.style.display = 'block';
                        item.style.animation = 'slideInFromLeft 0.3s ease-out';
                    } else {
                        item.style.display = 'none';
                    }
                }
            });
        });
    }
    
    // تحسينات الإشعارات
    const notificationItems = document.querySelectorAll('.fi-sidebar-nav-item[data-notification]');
    
    notificationItems.forEach(item => {
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: absolute;
            top: 8px;
            right: 8px;
            width: 8px;
            height: 8px;
            background: #ff4757;
            border-radius: 50%;
            animation: pulse 1s ease-in-out infinite;
            z-index: 2;
        `;
        
        item.style.position = 'relative';
        item.appendChild(notification);
    });
    
    // تحسينات التحميل
    const loadingItems = document.querySelectorAll('.fi-sidebar-nav-item[data-loading]');
    
    loadingItems.forEach(item => {
        const loader = document.createElement('div');
        loader.style.cssText = `
            position: absolute;
            top: 50%;
            right: 15px;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            transform: translateY(-50%);
        `;
        
        item.style.position = 'relative';
        item.appendChild(loader);
    });
    
    // تحسينات الأمان
    const secureItems = document.querySelectorAll('.fi-sidebar-nav-item[data-secure]');
    
    secureItems.forEach(item => {
        const lockIcon = document.createElement('i');
        lockIcon.className = 'fas fa-lock';
        lockIcon.style.cssText = `
            position: absolute;
            top: 8px;
            right: 8px;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.7);
            z-index: 2;
        `;
        
        item.style.position = 'relative';
        item.appendChild(lockIcon);
    });
});

// تأثيرات CSS إضافية
const style = document.createElement('style');
style.textContent = `
    @keyframes rippleEffect {
        0% { width: 0; height: 0; opacity: 1; }
        100% { width: 100px; height: 100px; opacity: 0; }
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.2); }
    }
    
    @keyframes spin {
        0% { transform: translateY(-50%) rotate(0deg); }
        100% { transform: translateY(-50%) rotate(360deg); }
    }
    
    @keyframes slideInFromLeft {
        0% { transform: translateX(-100%); opacity: 0; }
        100% { transform: translateX(0); opacity: 1; }
    }
`;
document.head.appendChild(style);
