// Admin Panel Ultimate Interactions - التفاعلات النهائية المتقدمة

document.addEventListener('DOMContentLoaded', function() {
    
    // تحسين الرسوم المتحركة للكروت مع تأثيرات نهائية
    const cards = document.querySelectorAll('.fi-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('animate-fade-in');
        
        // إضافة تأثيرات تفاعلية نهائية
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-15px) scale(1.04)';
            this.style.boxShadow = '0 30px 100px rgba(161, 93, 191, 0.3)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 15px 60px rgba(161, 93, 191, 0.15)';
        });
    });

    // تحسين التفاعل مع الأزرار مع تأثيرات نهائية
    const buttons = document.querySelectorAll('.fi-btn-primary');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px) scale(1.1)';
            this.style.boxShadow = '0 20px 60px rgba(161, 93, 191, 0.6)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 10px 30px rgba(161, 93, 191, 0.4)';
        });
    });

    // تحسين التفاعل مع عناصر التنقل مع تأثيرات نهائية
    const navItems = document.querySelectorAll('.fi-sidebar-nav-item');
    navItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(8px) scale(1.03)';
            this.style.boxShadow = '0 12px 30px rgba(161, 93, 191, 0.4)';
        });
        
        item.addEventListener('mouseleave', function() {
            if (!this.classList.contains('fi-active') && !this.classList.contains('active')) {
                this.style.transform = 'translateX(0) scale(1)';
                this.style.boxShadow = 'none';
            }
        });
    });

    // تحسين التفاعل مع الجداول مع تأثيرات نهائية
    const tableRows = document.querySelectorAll('.fi-table-row');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.03)';
            this.style.boxShadow = '0 12px 30px rgba(161, 93, 191, 0.2)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع الحقول مع تأثيرات نهائية
    const inputs = document.querySelectorAll('.fi-input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.style.transform = 'translateY(-4px)';
            this.style.boxShadow = '0 0 0 8px rgba(161, 93, 191, 0.2)';
        });
        
        input.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع النوافذ المنبثقة مع تأثيرات نهائية
    const modals = document.querySelectorAll('.fi-modal');
    modals.forEach(modal => {
        modal.addEventListener('show', function() {
            this.style.opacity = '0';
            this.style.transform = 'scale(0.7)';
            
            setTimeout(() => {
                this.style.opacity = '1';
                this.style.transform = 'scale(1)';
            }, 10);
        });
    });

    // تحسين التفاعل مع التبويبات مع تأثيرات نهائية
    const tabs = document.querySelectorAll('.fi-tabs-tab');
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // تحسين التفاعل مع الشارات مع تأثيرات نهائية
    const badges = document.querySelectorAll('.fi-badge');
    badges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.2)';
            this.style.boxShadow = '0 12px 25px rgba(161, 93, 191, 0.5)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = '0 8px 20px rgba(161, 93, 191, 0.4)';
        });
    });

    // تحسين التفاعل مع الروابط مع تأثيرات نهائية
    const links = document.querySelectorAll('.fi-link');
    links.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
            this.style.textShadow = '0 6px 12px rgba(161, 93, 191, 0.4)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.textShadow = 'none';
        });
    });

    // تحسين التفاعل مع الأيقونات مع تأثيرات نهائية
    const icons = document.querySelectorAll('.fi-icon');
    icons.forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.25) rotate(15deg)';
            this.style.filter = 'drop-shadow(0 12px 24px rgba(161, 93, 191, 0.5))';
        });
        
        icon.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
            this.style.filter = 'drop-shadow(0 6px 12px rgba(0, 0, 0, 0.2))';
        });
    });

    // تحسين التفاعل مع شريط البحث مع تأثيرات نهائية
    const searchField = document.querySelector('.fi-global-search-field');
    if (searchField) {
        searchField.addEventListener('focus', function() {
            this.style.transform = 'translateY(-4px)';
            this.style.boxShadow = '0 0 0 8px rgba(161, 93, 191, 0.2)';
        });
        
        searchField.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    }

    // تحسين التفاعل مع مسار التنقل مع تأثيرات نهائية
    const breadcrumbs = document.querySelectorAll('.fi-breadcrumbs-item');
    breadcrumbs.forEach(breadcrumb => {
        breadcrumb.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
            this.style.textShadow = '0 2px 4px rgba(0, 0, 0, 0.15)';
        });
        
        breadcrumb.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.textShadow = 'none';
        });
    });

    // تحسين التفاعل مع الترقيم مع تأثيرات نهائية
    const paginationItems = document.querySelectorAll('.fi-pagination-item');
    paginationItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.2)';
            this.style.boxShadow = '0 12px 25px rgba(161, 93, 191, 0.5)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = '0 8px 20px rgba(161, 93, 191, 0.4)';
        });
    });

    // تحسين التفاعل مع العناصر التفاعلية مع تأثيرات نهائية
    const checkboxes = document.querySelectorAll('.fi-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                this.style.transform = 'scale(1.2)';
                this.style.boxShadow = '0 12px 25px rgba(161, 93, 191, 0.5)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                    this.style.boxShadow = '0 8px 20px rgba(161, 93, 191, 0.4)';
                }, 400);
            }
        });
    });

    const radios = document.querySelectorAll('.fi-radio');
    radios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                this.style.transform = 'scale(1.2)';
                this.style.boxShadow = '0 12px 25px rgba(161, 93, 191, 0.5)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                    this.style.boxShadow = '0 8px 20px rgba(161, 93, 191, 0.4)';
                }, 400);
            }
        });
    });

    // تحسين التفاعل مع القوائم المنسدلة مع تأثيرات نهائية
    const selects = document.querySelectorAll('.fi-select');
    selects.forEach(select => {
        select.addEventListener('focus', function() {
            this.style.transform = 'translateY(-4px)';
            this.style.boxShadow = '0 0 0 8px rgba(161, 93, 191, 0.2)';
        });
        
        select.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع التنبيهات مع تأثيرات نهائية
    const alerts = document.querySelectorAll('.fi-alert');
    alerts.forEach(alert => {
        alert.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-6px)';
            this.style.boxShadow = '0 15px 35px rgba(161, 93, 191, 0.25)';
        });
        
        alert.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 12px 30px rgba(161, 93, 191, 0.2)';
        });
    });

    // تحسين التفاعل مع الإحصائيات مع تأثيرات نهائية
    const statsCards = document.querySelectorAll('.fi-stats-overview .fi-card');
    statsCards.forEach((card, index) => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-15px) scale(1.06)';
            this.style.boxShadow = '0 30px 100px rgba(161, 93, 191, 0.3)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 15px 60px rgba(161, 93, 191, 0.15)';
        });
    });

    // تحسين التفاعل مع العناوين مع تأثيرات نهائية
    const headings = document.querySelectorAll('.fi-header-heading');
    headings.forEach(heading => {
        heading.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.08)';
            this.style.textShadow = '0 6px 12px rgba(0, 0, 0, 0.15)';
        });
        
        heading.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.textShadow = '0 6px 12px rgba(0, 0, 0, 0.15)';
        });
    });

    // تحسين التفاعل مع الصور مع تأثيرات نهائية
    const images = document.querySelectorAll('.fi-image img');
    images.forEach(image => {
        image.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
            this.style.filter = 'brightness(1.15) contrast(1.15)';
        });
        
        image.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.filter = 'brightness(1) contrast(1)';
        });
    });

    // تحسين التفاعل مع الملفات مع تأثيرات نهائية
    const fileUploads = document.querySelectorAll('.fi-file-upload');
    fileUploads.forEach(upload => {
        upload.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.transform = 'scale(1.08)';
            this.style.borderColor = '#A15DBF';
            this.style.boxShadow = '0 12px 30px rgba(161, 93, 191, 0.4)';
        });
        
        upload.addEventListener('dragleave', function() {
            this.style.transform = 'scale(1)';
            this.style.borderColor = '';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع النماذج مع تأثيرات نهائية
    const forms = document.querySelectorAll('.fi-form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const submitButton = this.querySelector('.fi-btn-primary');
            if (submitButton) {
                submitButton.style.transform = 'scale(0.9)';
                submitButton.style.boxShadow = '0 6px 20px rgba(161, 93, 191, 0.4)';
                setTimeout(() => {
                    submitButton.style.transform = 'scale(1)';
                    submitButton.style.boxShadow = '0 10px 30px rgba(161, 93, 191, 0.4)';
                }, 400);
            }
        });
    });

    // تحسين التفاعل مع القوائم مع تأثيرات نهائية
    const menus = document.querySelectorAll('.fi-menu');
    menus.forEach(menu => {
        menu.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-6px)';
            this.style.boxShadow = '0 15px 35px rgba(161, 93, 191, 0.25)';
        });
        
        menu.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 12px 30px rgba(161, 93, 191, 0.2)';
        });
    });

    // تحسين التفاعل مع الأقسام مع تأثيرات نهائية
    const sections = document.querySelectorAll('.fi-section');
    sections.forEach(section => {
        section.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.boxShadow = '0 12px 30px rgba(161, 93, 191, 0.2)';
        });
        
        section.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع المحتوى مع تأثيرات نهائية
    const content = document.querySelectorAll('.fi-content');
    content.forEach(content => {
        content.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.boxShadow = '0 12px 30px rgba(161, 93, 191, 0.2)';
        });
        
        content.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع الشريط الجانبي مع تأثيرات نهائية
    const sidebar = document.querySelector('.fi-sidebar');
    if (sidebar) {
        sidebar.addEventListener('mouseenter', function() {
            this.style.boxShadow = '8px 0 60px rgba(161, 93, 191, 0.6)';
        });
        
        sidebar.addEventListener('mouseleave', function() {
            this.style.boxShadow = '8px 0 50px rgba(161, 93, 191, 0.5)';
        });
    }

    // تحسين التفاعل مع الشريط العلوي مع تأثيرات نهائية
    const topbar = document.querySelector('.fi-topbar');
    if (topbar) {
        topbar.addEventListener('mouseenter', function() {
            this.style.boxShadow = '0 6px 60px rgba(161, 93, 191, 0.5)';
        });
        
        topbar.addEventListener('mouseleave', function() {
            this.style.boxShadow = '0 6px 50px rgba(161, 93, 191, 0.4)';
        });
    }

    // تحسين التفاعل مع المحتوى الرئيسي مع تأثيرات نهائية
    const main = document.querySelector('.fi-main');
    if (main) {
        main.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.boxShadow = '0 12px 30px rgba(161, 93, 191, 0.2)';
        });
        
        main.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    }

    // تحسين التفاعل مع اللوحة مع تأثيرات نهائية
    const panel = document.querySelector('.fi-panel');
    if (panel) {
        panel.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.boxShadow = '0 12px 30px rgba(161, 93, 191, 0.2)';
        });
        
        panel.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    }

    // تحسين التفاعل مع الجسم مع تأثيرات نهائية
    const body = document.querySelector('.fi-body');
    if (body) {
        body.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
            this.style.boxShadow = '0 12px 30px rgba(161, 93, 191, 0.2)';
        });
        
        body.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    }

    console.log('Admin Panel Ultimate Interactions Loaded Successfully!');
});
