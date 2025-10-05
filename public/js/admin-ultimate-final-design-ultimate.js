// Admin Panel Ultimate Final Design Ultimate - التفاعلات النهائية المتقدمة

document.addEventListener('DOMContentLoaded', function() {
    
    // تحسين الرسوم المتحركة للكروت مع تأثيرات نهائية متقدمة
    const cards = document.querySelectorAll('.fi-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('animate-fade-in');
        
        // إضافة تأثيرات تفاعلية نهائية متقدمة
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-35px) scale(1.1)';
            this.style.boxShadow = '0 70px 200px rgba(161, 93, 191, 0.5)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 35px 140px rgba(161, 93, 191, 0.3)';
        });
    });

    // تحسين التفاعل مع الأزرار مع تأثيرات نهائية متقدمة
    const buttons = document.querySelectorAll('.fi-btn-primary');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-12px) scale(1.2)';
            this.style.boxShadow = '0 40px 100px rgba(161, 93, 191, 1)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 20px 60px rgba(161, 93, 191, 0.6)';
        });
    });

    // تحسين التفاعل مع عناصر التنقل مع تأثيرات نهائية متقدمة
    const navItems = document.querySelectorAll('.fi-sidebar-nav-item');
    navItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(18px) scale(1.08)';
            this.style.boxShadow = '0 30px 70px rgba(161, 93, 191, 0.8)';
        });
        
        item.addEventListener('mouseleave', function() {
            if (!this.classList.contains('fi-active') && !this.classList.contains('active')) {
                this.style.transform = 'translateX(0) scale(1)';
                this.style.boxShadow = 'none';
            }
        });
    });

    // تحسين التفاعل مع الجداول مع تأثيرات نهائية متقدمة
    const tableRows = document.querySelectorAll('.fi-table-row');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.08)';
            this.style.boxShadow = '0 30px 70px rgba(161, 93, 191, 0.4)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع الحقول مع تأثيرات نهائية متقدمة
    const inputs = document.querySelectorAll('.fi-input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.style.transform = 'translateY(-10px)';
            this.style.boxShadow = '0 0 0 18px rgba(161, 93, 191, 0.4)';
        });
        
        input.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع النوافذ المنبثقة مع تأثيرات نهائية متقدمة
    const modals = document.querySelectorAll('.fi-modal');
    modals.forEach(modal => {
        modal.addEventListener('show', function() {
            this.style.opacity = '0';
            this.style.transform = 'scale(0.3)';
            
            setTimeout(() => {
                this.style.opacity = '1';
                this.style.transform = 'scale(1)';
            }, 10);
        });
    });

    // تحسين التفاعل مع التبويبات مع تأثيرات نهائية متقدمة
    const tabs = document.querySelectorAll('.fi-tabs-tab');
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // تحسين التفاعل مع الشارات مع تأثيرات نهائية متقدمة
    const badges = document.querySelectorAll('.fi-badge');
    badges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.4)';
            this.style.boxShadow = '0 30px 70px rgba(161, 93, 191, 0.9)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = '0 18px 45px rgba(161, 93, 191, 0.6)';
        });
    });

    // تحسين التفاعل مع الروابط مع تأثيرات نهائية متقدمة
    const links = document.querySelectorAll('.fi-link');
    links.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
            this.style.textShadow = '0 15px 30px rgba(161, 93, 191, 0.8)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.textShadow = 'none';
        });
    });

    // تحسين التفاعل مع الأيقونات مع تأثيرات نهائية متقدمة
    const icons = document.querySelectorAll('.fi-icon');
    icons.forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.45) rotate(35deg)';
            this.style.filter = 'drop-shadow(0 30px 60px rgba(161, 93, 191, 0.9))';
        });
        
        icon.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
            this.style.filter = 'drop-shadow(0 15px 30px rgba(0, 0, 0, 0.4))';
        });
    });

    // تحسين التفاعل مع شريط البحث مع تأثيرات نهائية متقدمة
    const searchField = document.querySelector('.fi-global-search-field');
    if (searchField) {
        searchField.addEventListener('focus', function() {
            this.style.transform = 'translateY(-10px)';
            this.style.boxShadow = '0 0 0 18px rgba(161, 93, 191, 0.4)';
        });
        
        searchField.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    }

    // تحسين التفاعل مع مسار التنقل مع تأثيرات نهائية متقدمة
    const breadcrumbs = document.querySelectorAll('.fi-breadcrumbs-item');
    breadcrumbs.forEach(breadcrumb => {
        breadcrumb.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
            this.style.textShadow = '0 6px 12px rgba(0, 0, 0, 0.35)';
        });
        
        breadcrumb.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.textShadow = 'none';
        });
    });

    // تحسين التفاعل مع الترقيم مع تأثيرات نهائية متقدمة
    const paginationItems = document.querySelectorAll('.fi-pagination-item');
    paginationItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.4)';
            this.style.boxShadow = '0 30px 70px rgba(161, 93, 191, 0.9)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = '0 18px 45px rgba(161, 93, 191, 0.6)';
        });
    });

    // تحسين التفاعل مع العناصر التفاعلية مع تأثيرات نهائية متقدمة
    const checkboxes = document.querySelectorAll('.fi-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                this.style.transform = 'scale(1.4)';
                this.style.boxShadow = '0 30px 70px rgba(161, 93, 191, 0.9)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                    this.style.boxShadow = '0 18px 45px rgba(161, 93, 191, 0.6)';
                }, 800);
            }
        });
    });

    const radios = document.querySelectorAll('.fi-radio');
    radios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                this.style.transform = 'scale(1.4)';
                this.style.boxShadow = '0 30px 70px rgba(161, 93, 191, 0.9)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                    this.style.boxShadow = '0 18px 45px rgba(161, 93, 191, 0.6)';
                }, 800);
            }
        });
    });

    // تحسين التفاعل مع القوائم المنسدلة مع تأثيرات نهائية متقدمة
    const selects = document.querySelectorAll('.fi-select');
    selects.forEach(select => {
        select.addEventListener('focus', function() {
            this.style.transform = 'translateY(-10px)';
            this.style.boxShadow = '0 0 0 18px rgba(161, 93, 191, 0.4)';
        });
        
        select.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع التنبيهات مع تأثيرات نهائية متقدمة
    const alerts = document.querySelectorAll('.fi-alert');
    alerts.forEach(alert => {
        alert.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-15px)';
            this.style.boxShadow = '0 35px 80px rgba(161, 93, 191, 0.45)';
        });
        
        alert.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 30px 70px rgba(161, 93, 191, 0.4)';
        });
    });

    // تحسين التفاعل مع الإحصائيات مع تأثيرات نهائية متقدمة
    const statsCards = document.querySelectorAll('.fi-stats-overview .fi-card');
    statsCards.forEach((card, index) => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-35px) scale(1.15)';
            this.style.boxShadow = '0 70px 200px rgba(161, 93, 191, 0.6)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 35px 140px rgba(161, 93, 191, 0.3)';
        });
    });

    // تحسين التفاعل مع العناوين مع تأثيرات نهائية متقدمة
    const headings = document.querySelectorAll('.fi-header-heading');
    headings.forEach(heading => {
        heading.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.18)';
            this.style.textShadow = '0 15px 30px rgba(0, 0, 0, 0.35)';
        });
        
        heading.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.textShadow = '0 15px 30px rgba(0, 0, 0, 0.35)';
        });
    });

    // تحسين التفاعل مع الصور مع تأثيرات نهائية متقدمة
    const images = document.querySelectorAll('.fi-image img');
    images.forEach(image => {
        image.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.2)';
            this.style.filter = 'brightness(1.35) contrast(1.35)';
        });
        
        image.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.filter = 'brightness(1) contrast(1)';
        });
    });

    // تحسين التفاعل مع الملفات مع تأثيرات نهائية متقدمة
    const fileUploads = document.querySelectorAll('.fi-file-upload');
    fileUploads.forEach(upload => {
        upload.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.transform = 'scale(1.18)';
            this.style.borderColor = '#A15DBF';
            this.style.boxShadow = '0 30px 70px rgba(161, 93, 191, 0.8)';
        });
        
        upload.addEventListener('dragleave', function() {
            this.style.transform = 'scale(1)';
            this.style.borderColor = '';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع النماذج مع تأثيرات نهائية متقدمة
    const forms = document.querySelectorAll('.fi-form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const submitButton = this.querySelector('.fi-btn-primary');
            if (submitButton) {
                submitButton.style.transform = 'scale(0.7)';
                submitButton.style.boxShadow = '0 15px 40px rgba(161, 93, 191, 0.8)';
                setTimeout(() => {
                    submitButton.style.transform = 'scale(1)';
                    submitButton.style.boxShadow = '0 20px 60px rgba(161, 93, 191, 0.6)';
                }, 800);
            }
        });
    });

    // تحسين التفاعل مع القوائم مع تأثيرات نهائية متقدمة
    const menus = document.querySelectorAll('.fi-menu');
    menus.forEach(menu => {
        menu.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-15px)';
            this.style.boxShadow = '0 35px 80px rgba(161, 93, 191, 0.45)';
        });
        
        menu.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 30px 70px rgba(161, 93, 191, 0.4)';
        });
    });

    // تحسين التفاعل مع الأقسام مع تأثيرات نهائية متقدمة
    const sections = document.querySelectorAll('.fi-section');
    sections.forEach(section => {
        section.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
            this.style.boxShadow = '0 30px 70px rgba(161, 93, 191, 0.4)';
        });
        
        section.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع المحتوى مع تأثيرات نهائية متقدمة
    const content = document.querySelectorAll('.fi-content');
    content.forEach(content => {
        content.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
            this.style.boxShadow = '0 30px 70px rgba(161, 93, 191, 0.4)';
        });
        
        content.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    });

    // تحسين التفاعل مع الشريط الجانبي مع تأثيرات نهائية متقدمة
    const sidebar = document.querySelector('.fi-sidebar');
    if (sidebar) {
        sidebar.addEventListener('mouseenter', function() {
            this.style.boxShadow = '18px 0 110px rgba(161, 93, 191, 1)';
        });
        
        sidebar.addEventListener('mouseleave', function() {
            this.style.boxShadow = '18px 0 100px rgba(161, 93, 191, 0.9)';
        });
    }

    // تحسين التفاعل مع الشريط العلوي مع تأثيرات نهائية متقدمة
    const topbar = document.querySelector('.fi-topbar');
    if (topbar) {
        topbar.addEventListener('mouseenter', function() {
            this.style.boxShadow = '0 15px 110px rgba(161, 93, 191, 0.9)';
        });
        
        topbar.addEventListener('mouseleave', function() {
            this.style.boxShadow = '0 15px 100px rgba(161, 93, 191, 0.8)';
        });
    }

    // تحسين التفاعل مع المحتوى الرئيسي مع تأثيرات نهائية متقدمة
    const main = document.querySelector('.fi-main');
    if (main) {
        main.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
            this.style.boxShadow = '0 30px 70px rgba(161, 93, 191, 0.4)';
        });
        
        main.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    }

    // تحسين التفاعل مع اللوحة مع تأثيرات نهائية متقدمة
    const panel = document.querySelector('.fi-panel');
    if (panel) {
        panel.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
            this.style.boxShadow = '0 30px 70px rgba(161, 93, 191, 0.4)';
        });
        
        panel.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    }

    // تحسين التفاعل مع الجسم مع تأثيرات نهائية متقدمة
    const body = document.querySelector('.fi-body');
    if (body) {
        body.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px)';
            this.style.boxShadow = '0 30px 70px rgba(161, 93, 191, 0.4)';
        });
        
        body.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = 'none';
        });
    }

    console.log('Admin Panel Ultimate Final Design Ultimate Interactions Loaded Successfully!');
});
