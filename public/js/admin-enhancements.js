// Admin Panel Modern Enhancements - تحسينات عصري للوحة التحكم

document.addEventListener('DOMContentLoaded', function() {
    
    // تحسين الرسوم المتحركة للكروت
    const cards = document.querySelectorAll('.fi-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('animate-fade-in');
        
        // إضافة تأثيرات تفاعلية متقدمة
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-8px) scale(1.02)';
            this.style.boxShadow = '0 20px 60px rgba(161, 93, 191, 0.2)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
            this.style.boxShadow = '0 10px 40px rgba(161, 93, 191, 0.1)';
        });
    });

    // تحسين التفاعل مع الأزرار
    const buttons = document.querySelectorAll('.fi-btn-primary');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px) scale(1.02)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // تحسين التفاعل مع عناصر التنقل
    const navItems = document.querySelectorAll('.fi-sidebar-nav-item');
    navItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(4px)';
        });
        
        item.addEventListener('mouseleave', function() {
            if (!this.classList.contains('fi-active') && !this.classList.contains('active')) {
                this.style.transform = 'translateX(0)';
            }
        });
    });

    // تحسين التفاعل مع الجداول
    const tableRows = document.querySelectorAll('.fi-table-row');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.01)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // تحسين التفاعل مع الحقول
    const inputs = document.querySelectorAll('.fi-input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        input.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // تحسين التفاعل مع النوافذ المنبثقة
    const modals = document.querySelectorAll('.fi-modal');
    modals.forEach(modal => {
        modal.addEventListener('show', function() {
            this.style.opacity = '0';
            this.style.transform = 'scale(0.9)';
            
            setTimeout(() => {
                this.style.opacity = '1';
                this.style.transform = 'scale(1)';
            }, 10);
        });
    });

    // تحسين التفاعل مع التبويبات
    const tabs = document.querySelectorAll('.fi-tabs-tab');
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // تحسين التفاعل مع الشارات
    const badges = document.querySelectorAll('.fi-badge');
    badges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // تحسين التفاعل مع الروابط
    const links = document.querySelectorAll('.fi-link');
    links.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // تحسين التفاعل مع الأيقونات
    const icons = document.querySelectorAll('.fi-icon');
    icons.forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) rotate(5deg)';
        });
        
        icon.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
        });
    });

    // تحسين التفاعل مع شريط البحث
    const searchField = document.querySelector('.fi-global-search-field');
    if (searchField) {
        searchField.addEventListener('focus', function() {
            this.style.transform = 'translateY(-1px)';
            this.style.boxShadow = '0 4px 20px rgba(161, 93, 191, 0.2)';
        });
        
        searchField.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 2px 10px rgba(161, 93, 191, 0.1)';
        });
    }

    // تحسين التفاعل مع مسار التنقل
    const breadcrumbs = document.querySelectorAll('.fi-breadcrumbs-item');
    breadcrumbs.forEach(breadcrumb => {
        breadcrumb.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        breadcrumb.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // تحسين التفاعل مع الترقيم
    const paginationItems = document.querySelectorAll('.fi-pagination-item');
    paginationItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // تحسين التفاعل مع العناصر التفاعلية
    const checkboxes = document.querySelectorAll('.fi-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                this.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 200);
            }
        });
    });

    const radios = document.querySelectorAll('.fi-radio');
    radios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                this.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 200);
            }
        });
    });

    // تحسين التفاعل مع القوائم المنسدلة
    const selects = document.querySelectorAll('.fi-select');
    selects.forEach(select => {
        select.addEventListener('focus', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        select.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // تحسين التفاعل مع التنبيهات
    const alerts = document.querySelectorAll('.fi-alert');
    alerts.forEach(alert => {
        alert.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        alert.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // تحسين التفاعل مع الإحصائيات
    const statsCards = document.querySelectorAll('.fi-stats-overview .fi-card');
    statsCards.forEach((card, index) => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // تحسين التفاعل مع العناوين
    const headings = document.querySelectorAll('.fi-header-heading');
    headings.forEach(heading => {
        heading.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.02)';
        });
        
        heading.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // تحسين التفاعل مع الصور
    const images = document.querySelectorAll('.fi-image img');
    images.forEach(image => {
        image.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
        });
        
        image.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // تحسين التفاعل مع الملفات
    const fileUploads = document.querySelectorAll('.fi-file-upload');
    fileUploads.forEach(upload => {
        upload.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.transform = 'scale(1.02)';
            this.style.borderColor = '#A15DBF';
        });
        
        upload.addEventListener('dragleave', function() {
            this.style.transform = 'scale(1)';
            this.style.borderColor = '';
        });
    });

    // تحسين التفاعل مع النماذج
    const forms = document.querySelectorAll('.fi-form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const submitButton = this.querySelector('.fi-btn-primary');
            if (submitButton) {
                submitButton.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    submitButton.style.transform = 'scale(1)';
                }, 200);
            }
        });
    });

    // تحسين التفاعل مع القوائم
    const menus = document.querySelectorAll('.fi-menu');
    menus.forEach(menu => {
        menu.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        menu.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // تحسين التفاعل مع الأقسام
    const sections = document.querySelectorAll('.fi-section');
    sections.forEach(section => {
        section.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        section.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // تحسين التفاعل مع المحتوى
    const content = document.querySelectorAll('.fi-content');
    content.forEach(content => {
        content.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        content.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // تحسين التفاعل مع الشريط الجانبي
    const sidebar = document.querySelector('.fi-sidebar');
    if (sidebar) {
        sidebar.addEventListener('mouseenter', function() {
            this.style.boxShadow = '4px 0 30px rgba(161, 93, 191, 0.4)';
        });
        
        sidebar.addEventListener('mouseleave', function() {
            this.style.boxShadow = '4px 0 20px rgba(161, 93, 191, 0.3)';
        });
    }

    // تحسين التفاعل مع الشريط العلوي
    const topbar = document.querySelector('.fi-topbar');
    if (topbar) {
        topbar.addEventListener('mouseenter', function() {
            this.style.boxShadow = '0 2px 30px rgba(161, 93, 191, 0.3)';
        });
        
        topbar.addEventListener('mouseleave', function() {
            this.style.boxShadow = '0 2px 20px rgba(161, 93, 191, 0.2)';
        });
    }

    // تحسين التفاعل مع المحتوى الرئيسي
    const main = document.querySelector('.fi-main');
    if (main) {
        main.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        main.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    }

    // تحسين التفاعل مع اللوحة
    const panel = document.querySelector('.fi-panel');
    if (panel) {
        panel.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        panel.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    }

    // تحسين التفاعل مع الجسم
    const body = document.querySelector('.fi-body');
    if (body) {
        body.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        body.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    }

    // تحسين التفاعل مع المحتوى
    const content = document.querySelectorAll('.fi-content');
    content.forEach(content => {
        content.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        content.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // تحسين التفاعل مع الأقسام
    const sections = document.querySelectorAll('.fi-section');
    sections.forEach(section => {
        section.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        section.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // تحسين التفاعل مع القوائم
    const menus = document.querySelectorAll('.fi-menu');
    menus.forEach(menu => {
        menu.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        menu.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // تحسين التفاعل مع النماذج
    const forms = document.querySelectorAll('.fi-form');
    forms.forEach(form => {
        form.addEventListener('submit', function() {
            const submitButton = this.querySelector('.fi-btn-primary');
            if (submitButton) {
                submitButton.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    submitButton.style.transform = 'scale(1)';
                }, 200);
            }
        });
    });

    // تحسين التفاعل مع الملفات
    const fileUploads = document.querySelectorAll('.fi-file-upload');
    fileUploads.forEach(upload => {
        upload.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.style.transform = 'scale(1.02)';
            this.style.borderColor = '#A15DBF';
        });
        
        upload.addEventListener('dragleave', function() {
            this.style.transform = 'scale(1)';
            this.style.borderColor = '';
        });
    });

    // تحسين التفاعل مع الصور
    const images = document.querySelectorAll('.fi-image img');
    images.forEach(image => {
        image.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
        });
        
        image.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // تحسين التفاعل مع العناوين
    const headings = document.querySelectorAll('.fi-header-heading');
    headings.forEach(heading => {
        heading.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.02)';
        });
        
        heading.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // تحسين التفاعل مع الإحصائيات
    const statsCards = document.querySelectorAll('.fi-stats-overview .fi-card');
    statsCards.forEach((card, index) => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px) scale(1.02)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // تحسين التفاعل مع التنبيهات
    const alerts = document.querySelectorAll('.fi-alert');
    alerts.forEach(alert => {
        alert.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        alert.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // تحسين التفاعل مع القوائم المنسدلة
    const selects = document.querySelectorAll('.fi-select');
    selects.forEach(select => {
        select.addEventListener('focus', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        select.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // تحسين التفاعل مع العناصر التفاعلية
    const checkboxes = document.querySelectorAll('.fi-checkbox');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                this.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 200);
            }
        });
    });

    const radios = document.querySelectorAll('.fi-radio');
    radios.forEach(radio => {
        radio.addEventListener('change', function() {
            if (this.checked) {
                this.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    this.style.transform = 'scale(1)';
                }, 200);
            }
        });
    });

    // تحسين التفاعل مع الترقيم
    const paginationItems = document.querySelectorAll('.fi-pagination-item');
    paginationItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // تحسين التفاعل مع مسار التنقل
    const breadcrumbs = document.querySelectorAll('.fi-breadcrumbs-item');
    breadcrumbs.forEach(breadcrumb => {
        breadcrumb.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        breadcrumb.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // تحسين التفاعل مع شريط البحث
    const searchField = document.querySelector('.fi-global-search-field');
    if (searchField) {
        searchField.addEventListener('focus', function() {
            this.style.transform = 'translateY(-1px)';
            this.style.boxShadow = '0 4px 20px rgba(161, 93, 191, 0.2)';
        });
        
        searchField.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 2px 10px rgba(161, 93, 191, 0.1)';
        });
    }

    // تحسين التفاعل مع الأيقونات
    const icons = document.querySelectorAll('.fi-icon');
    icons.forEach(icon => {
        icon.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1) rotate(5deg)';
        });
        
        icon.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1) rotate(0deg)';
        });
    });

    // تحسين التفاعل مع الروابط
    const links = document.querySelectorAll('.fi-link');
    links.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // تحسين التفاعل مع الشارات
    const badges = document.querySelectorAll('.fi-badge');
    badges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // تحسين التفاعل مع التبويبات
    const tabs = document.querySelectorAll('.fi-tabs-tab');
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // تحسين التفاعل مع النوافذ المنبثقة
    const modals = document.querySelectorAll('.fi-modal');
    modals.forEach(modal => {
        modal.addEventListener('show', function() {
            this.style.opacity = '0';
            this.style.transform = 'scale(0.9)';
            
            setTimeout(() => {
                this.style.opacity = '1';
                this.style.transform = 'scale(1)';
            }, 10);
        });
    });

    // تحسين التفاعل مع الحقول
    const inputs = document.querySelectorAll('.fi-input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.style.transform = 'translateY(-1px)';
        });
        
        input.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // تحسين التفاعل مع الجداول
    const tableRows = document.querySelectorAll('.fi-table-row');
    tableRows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.01)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });

    // تحسين التفاعل مع عناصر التنقل
    const navItems = document.querySelectorAll('.fi-sidebar-nav-item');
    navItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(4px)';
        });
        
        item.addEventListener('mouseleave', function() {
            if (!this.classList.contains('fi-active') && !this.classList.contains('active')) {
                this.style.transform = 'translateX(0)';
            }
        });
    });

    // تحسين التفاعل مع الأزرار
    const buttons = document.querySelectorAll('.fi-btn-primary');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px) scale(1.02)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });

    // تحسين الرسوم المتحركة للكروت
    const cards = document.querySelectorAll('.fi-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
        card.classList.add('animate-fade-in');
    });

    console.log('Admin Panel Modern Enhancements Loaded Successfully!');
});
