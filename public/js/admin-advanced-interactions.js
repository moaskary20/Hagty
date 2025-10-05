// Admin Panel Advanced Interactions - تفاعلات متقدمة للوحة التحكم

document.addEventListener('DOMContentLoaded', function() {
    
    // تحسين الرسوم المتحركة للكروت مع تأثيرات متقدمة
    const cards = document.querySelectorAll('.fi-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('animate-fade-in');
        
        // إضافة تأثيرات تفاعلية متقدمة
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-12px) scale(1.03)';
            this.style.boxShadow = '0 25px 80px rgba(161, 93, 191, 0.25)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 12px 50px rgba(161, 93, 191, 0.12)';
        });
    });

    // تحسين التفاعل مع الأزرار مع تأثيرات متقدمة
    const buttons = document.querySelectorAll('.fi-btn-primary');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px) scale(1.08)';
            this.style.boxShadow = '0 15px 45px rgba(161, 93, 191, 0.5)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 8px 25px rgba(161, 93, 191, 0.35)';
        });
    });

    // تحسين التفاعل مع عناصر التنقل مع تأثيرات متقدمة
    const navItems = document.querySelectorAll('.fi-sidebar-nav-item');
    navItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(6px) scale(1.02)';
            this.style.boxShadow = '0 8px 25px rgba(161, 93, 191, 0.3)';
        });
        
        item.addEventListener('mouseleave', function() {
            if (!this.classList.contains('fi-active') && !this.classList.contains('active')) {
                this.style.transform = 'translateX(0) scale(1)';
                this.style.boxShadow = 'none';
            }
        });
    });

    // تحسين التفاعل مع الجداول مع تأثيرات متقدمة
    const tableRows = document.querySelectorAll('.fi-table-row');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.02)';
            this.style.boxShadow = '0 8px 25px rgba(161, 93, 191, 0.15)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع الحقول مع تأثيرات متقدمة
    const inputs = document.querySelectorAll('.fi-input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.boxShadow = '0 0 0 6px rgba(161, 93, 191, 0.15)';
        });
        
        input.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع النوافذ المنبثقة مع تأثيرات متقدمة
    const modals = document.querySelectorAll('.fi-modal');
    modals.forEach(modal => {
        modal.addEventListener('show', function() {
            this.style.opacity = '0';
            this.style.transform = 'scale(0.8)';
            
            setTimeout(() => {
                this.style.opacity = '1';
                this.style.transform = 'scale(1)';
            }, 10);
        });
    });

    // تحسين التفاعل مع التبويبات مع تأثيرات متقدمة
    const tabs = document.querySelectorAll('.fi-tabs-tab');
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // تحسين التفاعل مع الشارات مع تأثيرات متقدمة
    const badges = document.querySelectorAll('.fi-badge');
    badges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.15)';
            this.style.boxShadow = '0 8px 20px rgba(161, 93, 191, 0.4)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = '0 6px 15px rgba(161, 93, 191, 0.35)';
        });
    });

    // تحسين التفاعل مع الروابط مع تأثيرات متقدمة
    const links = document.querySelectorAll('.fi-link');
    links.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.textShadow = '0 4px 8px rgba(161, 93, 191, 0.3)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.textShadow = 'none';
        });
    });

    // تحسين التفاعل مع الأيقونات مع تأثيرات متقدمة
    const icons = document.querySelectorAll('.fi-icon');
    icons.forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.2) rotate(10deg)';
            this.style.filter = 'drop-shadow(0 8px 16px rgba(161, 93, 191, 0.4))';
        });
        
        icon.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
            this.style.filter = 'drop-shadow(0 4px 8px rgba(0, 0, 0, 0.15))';
        });
    });

    // تحسين التفاعل مع شريط البحث مع تأثيرات متقدمة
    const searchField = document.querySelector('.fi-global-search-field');
    if (searchField) {
        searchField.addEventListener('focus', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.boxShadow = '0 0 0 6px rgba(161, 93, 191, 0.15)';
        });
        
        searchField.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    }

    // تحسين التفاعل مع مسار التنقل مع تأثيرات متقدمة
    const breadcrumbs = document.querySelectorAll('.fi-breadcrumbs-item');
    breadcrumbs.forEach(breadcrumb => {
        breadcrumb.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.textShadow = '0 2px 4px rgba(0, 0, 0, 0.1)';
        });
        
        breadcrumb.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.textShadow = 'none';
        });
    });

    // تحسين التفاعل مع الترقيم مع تأثيرات متقدمة
    const paginationItems = document.querySelectorAll('.fi-pagination-item');
    paginationItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.15)';
            this.style.boxShadow = '0 8px 20px rgba(161, 93, 191, 0.4)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = '0 6px 15px rgba(161, 93, 191, 0.35)';
        });
    });

    // تحسين التفاعل مع العناصر التفاعلية مع تأثيرات متقدمة
    const checkboxes = document.querySelectorAll('.fi-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                this.style.transform = 'scale(1.15)';
                this.style.boxShadow = '0 8px 20px rgba(161, 93, 191, 0.4)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                    this.style.boxShadow = '0 6px 15px rgba(161, 93, 191, 0.35)';
                }, 300);
            }
        });
    });

    const radios = document.querySelectorAll('.fi-radio');
    radios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                this.style.transform = 'scale(1.15)';
                this.style.boxShadow = '0 8px 20px rgba(161, 93, 191, 0.4)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                    this.style.boxShadow = '0 6px 15px rgba(161, 93, 191, 0.35)';
                }, 300);
            }
        });
    });

    // تحسين التفاعل مع القوائم المنسدلة مع تأثيرات متقدمة
    const selects = document.querySelectorAll('.fi-select');
    selects.forEach(select => {
        select.addEventListener('focus', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.boxShadow = '0 0 0 6px rgba(161, 93, 191, 0.15)';
        });
        
        select.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع التنبيهات مع تأثيرات متقدمة
    const alerts = document.querySelectorAll('.fi-alert');
    alerts.forEach(alert => {
        alert.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
            this.style.boxShadow = '0 12px 30px rgba(161, 93, 191, 0.2)';
        });
        
        alert.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 8px 25px rgba(161, 93, 191, 0.15)';
        });
    });

    // تحسين التفاعل مع الإحصائيات مع تأثيرات متقدمة
    const statsCards = document.querySelectorAll('.fi-stats-overview .fi-card');
    statsCards.forEach((card, index) => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-12px) scale(1.05)';
            this.style.boxShadow = '0 25px 80px rgba(161, 93, 191, 0.25)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 12px 50px rgba(161, 93, 191, 0.12)';
        });
    });

    // تحسين التفاعل مع العناوين مع تأثيرات متقدمة
    const headings = document.querySelectorAll('.fi-header-heading');
    headings.forEach(heading => {
        heading.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.textShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
        });
        
        heading.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.textShadow = '0 4px 8px rgba(0, 0, 0, 0.1)';
        });
    });

    // تحسين التفاعل مع الصور مع تأثيرات متقدمة
    const images = document.querySelectorAll('.fi-image img');
    images.forEach(image => {
        image.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.08)';
            this.style.filter = 'brightness(1.1) contrast(1.1)';
        });
        
        image.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.filter = 'brightness(1) contrast(1)';
        });
    });

    // تحسين التفاعل مع الملفات مع تأثيرات متقدمة
    const fileUploads = document.querySelectorAll('.fi-file-upload');
    fileUploads.forEach(upload => {
        upload.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.transform = 'scale(1.05)';
            this.style.borderColor = '#A15DBF';
            this.style.boxShadow = '0 8px 25px rgba(161, 93, 191, 0.3)';
        });
        
        upload.addEventListener('dragleave', function() {
            this.style.transform = 'scale(1)';
            this.style.borderColor = '';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع النماذج مع تأثيرات متقدمة
    const forms = document.querySelectorAll('.fi-form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const submitButton = this.querySelector('.fi-btn-primary');
            if (submitButton) {
                submitButton.style.transform = 'scale(0.95)';
                submitButton.style.boxShadow = '0 4px 15px rgba(161, 93, 191, 0.3)';
                setTimeout(() => {
                    submitButton.style.transform = 'scale(1)';
                    submitButton.style.boxShadow = '0 8px 25px rgba(161, 93, 191, 0.35)';
                }, 300);
            }
        });
    });

    // تحسين التفاعل مع القوائم مع تأثيرات متقدمة
    const menus = document.querySelectorAll('.fi-menu');
    menus.forEach(menu => {
        menu.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
            this.style.boxShadow = '0 12px 30px rgba(161, 93, 191, 0.2)';
        });
        
        menu.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 8px 25px rgba(161, 93, 191, 0.15)';
        });
    });

    // تحسين التفاعل مع الأقسام مع تأثيرات متقدمة
    const sections = document.querySelectorAll('.fi-section');
    sections.forEach(section => {
        section.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 8px 25px rgba(161, 93, 191, 0.15)';
        });
        
        section.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع المحتوى مع تأثيرات متقدمة
    const content = document.querySelectorAll('.fi-content');
    content.forEach(content => {
        content.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 8px 25px rgba(161, 93, 191, 0.15)';
        });
        
        content.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع الشريط الجانبي مع تأثيرات متقدمة
    const sidebar = document.querySelector('.fi-sidebar');
    if (sidebar) {
        sidebar.addEventListener('mouseenter', function() {
            this.style.boxShadow = '6px 0 50px rgba(161, 93, 191, 0.5)';
        });
        
        sidebar.addEventListener('mouseleave', function() {
            this.style.boxShadow = '6px 0 40px rgba(161, 93, 191, 0.4)';
        });
    }

    // تحسين التفاعل مع الشريط العلوي مع تأثيرات متقدمة
    const topbar = document.querySelector('.fi-topbar');
    if (topbar) {
        topbar.addEventListener('mouseenter', function() {
            this.style.boxShadow = '0 4px 50px rgba(161, 93, 191, 0.4)';
        });
        
        topbar.addEventListener('mouseleave', function() {
            this.style.boxShadow = '0 4px 40px rgba(161, 93, 191, 0.3)';
        });
    }

    // تحسين التفاعل مع المحتوى الرئيسي مع تأثيرات متقدمة
    const main = document.querySelector('.fi-main');
    if (main) {
        main.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 8px 25px rgba(161, 93, 191, 0.15)';
        });
        
        main.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    }

    // تحسين التفاعل مع اللوحة مع تأثيرات متقدمة
    const panel = document.querySelector('.fi-panel');
    if (panel) {
        panel.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 8px 25px rgba(161, 93, 191, 0.15)';
        });
        
        panel.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    }

    // تحسين التفاعل مع الجسم مع تأثيرات متقدمة
    const body = document.querySelector('.fi-body');
    if (body) {
        body.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 8px 25px rgba(161, 93, 191, 0.15)';
        });
        
        body.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    }

    console.log('Admin Panel Advanced Interactions Loaded Successfully!');
});
