<?php
echo "اختبار اتصال قاعدة البيانات...\n";

$dbPath = '/home/mohamed/Desktop/hagty/HAGTY Platform/database/database.sqlite';

if (!file_exists($dbPath)) {
    echo "ملف قاعدة البيانات غير موجود في: $dbPath\n";
    touch($dbPath);
    echo "تم إنشاء ملف قاعدة البيانات\n";
}

try {
    $pdo = new PDO('sqlite:' . $dbPath);
    echo "تم الاتصال بقاعدة البيانات بنجاح!\n";
    
    $pdo->exec("CREATE TABLE IF NOT EXISTS test_table (id INTEGER PRIMARY KEY, name TEXT)");
    echo "تم إنشاء جدول تجريبي\n";
    
    $tables = $pdo->query("SELECT name FROM sqlite_master WHERE type='table'")->fetchAll(PDO::FETCH_COLUMN);
    echo "الجداول الموجودة: " . implode(', ', $tables) . "\n";
    
} catch (Exception $e) {
    echo "خطأ في الاتصال: " . $e->getMessage() . "\n";
}
?>
