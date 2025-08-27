<?php

// إنشاء جداول البيانات باستخدام PDO مباشرة
$database = '/home/mohamed/Desktop/hagty/HAGTY Platform/database/database.sqlite';

try {
    $pdo = new PDO('sqlite:' . $database);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "بدء إنشاء الجداول...\n";

    // إنشاء جدول migrations إذا لم يكن موجوداً
    $pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        migration TEXT NOT NULL,
        batch INTEGER NOT NULL
    )");

    // إنشاء جدول baby_day_steps
    $pdo->exec("CREATE TABLE IF NOT EXISTS baby_day_steps (
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
        created_at DATETIME,
        updated_at DATETIME
    )");

    // إنشاء جدول baby_health_infos
    $pdo->exec("CREATE TABLE IF NOT EXISTS baby_health_infos (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        content TEXT NOT NULL,
        category TEXT NOT NULL,
        age_range TEXT NOT NULL,
        source TEXT,
        image TEXT,
        tags TEXT,
        is_active INTEGER NOT NULL DEFAULT 1,
        created_at DATETIME,
        updated_at DATETIME
    )");

    // إنشاء جدول baby_expert_advice
    $pdo->exec("CREATE TABLE IF NOT EXISTS baby_expert_advice (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        expert_name TEXT NOT NULL,
        expert_specialization TEXT NOT NULL,
        title TEXT NOT NULL,
        content TEXT NOT NULL,
        target_age TEXT NOT NULL,
        image TEXT,
        tips TEXT,
        is_active INTEGER NOT NULL DEFAULT 1,
        created_at DATETIME,
        updated_at DATETIME
    )");

    // إنشاء جدول baby_doctor_tips
    $pdo->exec("CREATE TABLE IF NOT EXISTS baby_doctor_tips (
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
        created_at DATETIME,
        updated_at DATETIME
    )");

    // إنشاء جدول baby_monthly_growths
    $pdo->exec("CREATE TABLE IF NOT EXISTS baby_monthly_growths (
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
        created_at DATETIME,
        updated_at DATETIME
    )");

    // إنشاء جدول baby_shower_lists
    $pdo->exec("CREATE TABLE IF NOT EXISTS baby_shower_lists (
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
        created_at DATETIME,
        updated_at DATETIME
    )");

    echo "تم إنشاء الجداول بنجاح!\n";

    // إضافة بيانات تجريبية
    echo "إضافة البيانات التجريبية...\n";

    // خطوات الطفل اليومية
    $stmt = $pdo->prepare("INSERT OR IGNORE INTO baby_day_steps (title, description, step_number, age_group, category, difficulty_level, is_active, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, datetime('now'), datetime('now'))");
    
    $daySteps = [
        ['تغيير الحفاظة', 'تغيير حفاظة الطفل كل 2-3 ساعات أو عند الحاجة. تأكدي من تنظيف المنطقة جيداً واستخدام كريم الحماية.', 1, '0-12 شهر', 'العناية اليومية', 'سهل', 1],
        ['الرضاعة', 'إطعام الطفل كل 2-3 ساعات. للرضاعة الطبيعية، تأكدي من الوضعية الصحيحة.', 2, '0-6 أشهر', 'التغذية', 'متوسط', 1],
        ['النوم الآمن', 'ضعي الطفل على ظهره للنوم، في سرير منفصل، بدون وسائد أو بطانيات فضفاضة.', 3, '0-12 شهر', 'النوم', 'سهل', 1],
        ['وقت البطن', 'ضعي الطفل على بطنه لفترات قصيرة عندما يكون مستيقظاً لتقوية عضلات الرقبة والظهر.', 4, '1-6 أشهر', 'التطوير الحركي', 'متوسط', 1]
    ];

    foreach ($daySteps as $step) {
        $stmt->execute($step);
    }

    // المعلومات الصحية
    $stmt = $pdo->prepare("INSERT OR IGNORE INTO baby_health_infos (title, content, category, age_range, source, is_active, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, datetime('now'), datetime('now'))");
    
    $healthInfos = [
        ['أهمية الرضاعة الطبيعية', 'الرضاعة الطبيعية توفر جميع العناصر الغذائية التي يحتاجها طفلك في الأشهر الستة الأولى.', 'التغذية', '0-6 أشهر', 'منظمة الصحة العالمية', 1],
        ['علامات الجفاف عند الأطفال', 'راقبي علامات الجفاف مثل قلة البلل في الحفاظة، جفاف الفم، البكاء بدون دموع.', 'الصحة العامة', '0-12 شهر', 'الأكاديمية الأمريكية لطب الأطفال', 1]
    ];

    foreach ($healthInfos as $info) {
        $stmt->execute($info);
    }

    echo "تم إضافة البيانات التجريبية بنجاح!\n";

    // التحقق من الجداول
    $tables = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name LIKE 'baby_%'")->fetchAll(PDO::FETCH_COLUMN);
    
    echo "الجداول المنشأة:\n";
    foreach ($tables as $table) {
        $count = $pdo->query("SELECT COUNT(*) FROM $table")->fetchColumn();
        echo "- $table: $count صف\n";
    }

} catch (Exception $e) {
    echo "خطأ: " . $e->getMessage() . "\n";
}
