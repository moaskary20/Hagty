<?php

// إنشاء قاعدة البيانات والجداول مباشرة
$dbFile = '/home/mohamed/Desktop/hagty/HAGTY Platform/database/database.sqlite';

// التأكد من وجود ملف قاعدة البيانات
if (!file_exists($dbFile)) {
    file_put_contents($dbFile, '');
    echo "تم إنشاء ملف قاعدة البيانات\n";
}

try {
    $pdo = new PDO('sqlite:' . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "الاتصال بقاعدة البيانات نجح\n";
    
    // إنشاء جدول baby_day_steps
    $sql = "CREATE TABLE IF NOT EXISTS baby_day_steps (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        description TEXT NOT NULL,
        step_number INTEGER NOT NULL,
        age_group TEXT NOT NULL,
        category TEXT NOT NULL DEFAULT 'عام',
        difficulty_level TEXT DEFAULT 'سهل',
        image TEXT,
        tips TEXT,
        is_active INTEGER NOT NULL DEFAULT 1,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";
    
    $pdo->exec($sql);
    echo "تم إنشاء جدول baby_day_steps\n";
    
    // إنشاء باقي الجداول
    $tables = [
        'baby_health_infos' => "CREATE TABLE IF NOT EXISTS baby_health_infos (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            content TEXT NOT NULL,
            category TEXT NOT NULL,
            age_range TEXT NOT NULL,
            source TEXT,
            image TEXT,
            tags TEXT,
            is_active INTEGER NOT NULL DEFAULT 1,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )",
        
        'baby_expert_advice' => "CREATE TABLE IF NOT EXISTS baby_expert_advice (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            expert_name TEXT NOT NULL,
            expert_specialization TEXT NOT NULL,
            title TEXT NOT NULL,
            content TEXT NOT NULL,
            target_age TEXT NOT NULL,
            image TEXT,
            tips TEXT,
            is_active INTEGER NOT NULL DEFAULT 1,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )",
        
        'baby_doctor_tips' => "CREATE TABLE IF NOT EXISTS baby_doctor_tips (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            doctor_name TEXT NOT NULL,
            doctor_specialization TEXT NOT NULL,
            title TEXT NOT NULL,
            content TEXT NOT NULL,
            urgency_level TEXT NOT NULL,
            symptoms TEXT,
            age_group TEXT NOT NULL,
            image TEXT,
            is_active INTEGER NOT NULL DEFAULT 1,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )",
        
        'baby_monthly_growths' => "CREATE TABLE IF NOT EXISTS baby_monthly_growths (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            month_number INTEGER NOT NULL,
            title TEXT NOT NULL,
            description TEXT NOT NULL,
            physical_development TEXT,
            cognitive_development TEXT,
            milestones TEXT,
            care_tips TEXT,
            image TEXT,
            is_active INTEGER NOT NULL DEFAULT 1,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )",
        
        'baby_shower_lists' => "CREATE TABLE IF NOT EXISTS baby_shower_lists (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            item_name TEXT NOT NULL,
            description TEXT NOT NULL,
            category TEXT NOT NULL,
            priority TEXT NOT NULL,
            estimated_price REAL,
            notes TEXT,
            is_purchased INTEGER NOT NULL DEFAULT 0,
            image TEXT,
            is_active INTEGER NOT NULL DEFAULT 1,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )"
    ];
    
    foreach ($tables as $name => $sql) {
        $pdo->exec($sql);
        echo "تم إنشاء جدول $name\n";
    }
    
    // إضافة بيانات تجريبية
    $pdo->exec("INSERT OR IGNORE INTO baby_day_steps (title, description, step_number, age_group, category, difficulty_level) VALUES 
        ('تغيير الحفاظة', 'تغيير حفاظة الطفل كل 2-3 ساعات', 1, '0-12 شهر', 'العناية اليومية', 'سهل'),
        ('الرضاعة', 'إطعام الطفل كل 2-3 ساعات', 2, '0-6 أشهر', 'التغذية', 'متوسط')
    ");
    
    $pdo->exec("INSERT OR IGNORE INTO baby_health_infos (title, content, category, age_range) VALUES 
        ('أهمية الرضاعة الطبيعية', 'الرضاعة الطبيعية توفر جميع العناصر الغذائية', 'التغذية', '0-6 أشهر'),
        ('علامات الجفاف', 'راقبي علامات الجفاف مثل قلة البلل في الحفاظة', 'الصحة العامة', '0-12 شهر')
    ");
    
    echo "تم إضافة البيانات التجريبية\n";
    
    // التحقق من البيانات
    $count = $pdo->query("SELECT COUNT(*) FROM baby_day_steps")->fetchColumn();
    echo "عدد الصفوف في baby_day_steps: $count\n";
    
    $count = $pdo->query("SELECT COUNT(*) FROM baby_health_infos")->fetchColumn();
    echo "عدد الصفوف في baby_health_infos: $count\n";
    
    echo "تم الانتهاء بنجاح!\n";
    
} catch (Exception $e) {
    echo "خطأ: " . $e->getMessage() . "\n";
}
?>
