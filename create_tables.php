<?php

// تنفيذ SQL script لإنشاء جداول البيانات
$database = __DIR__ . '/database/database.sqlite';
$sqlFile = __DIR__ . '/database/create_baby_tables.sql';

try {
    // الاتصال بقاعدة البيانات
    $pdo = new PDO('sqlite:' . $database);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // قراءة ملف SQL
    if (!file_exists($sqlFile)) {
        die("ملف SQL غير موجود: $sqlFile\n");
    }

    $sql = file_get_contents($sqlFile);
    
    // تقسيم الأوامر وتنفيذها
    $statements = explode(';', $sql);
    
    foreach ($statements as $statement) {
        $statement = trim($statement);
        if (!empty($statement) && !str_starts_with($statement, '--')) {
            $pdo->exec($statement);
        }
    }
    
    echo "تم إنشاء جداول البيانات بنجاح!\n";
    
    // التحقق من الجداول
    $tables = $pdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name LIKE 'baby_%'")->fetchAll(PDO::FETCH_COLUMN);
    
    echo "الجداول المنشأة:\n";
    foreach ($tables as $table) {
        echo "- $table\n";
        
        // عد الصفوف في كل جدول
        $count = $pdo->query("SELECT COUNT(*) FROM $table")->fetchColumn();
        echo "  عدد الصفوف: $count\n";
    }
    
} catch (Exception $e) {
    echo "خطأ: " . $e->getMessage() . "\n";
}
