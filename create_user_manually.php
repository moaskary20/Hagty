<?php
// سكريبت بسيط لإضافة مستخدم جديد يدويًا في قاعدة بيانات Laravel
// يعمل مع جدول users الافتراضي

use Illuminate\Database\Capsule\Manager as DB;

require_once __DIR__.'/vendor/autoload.php';

// إعداد الاتصال بقاعدة البيانات
$db = new DB;
$db->addConnection([
    'driver' => 'sqlite',
    'database' => __DIR__.'/database/database.sqlite',
    'prefix' => '',
]);
$db->setAsGlobal();
$db->bootEloquent();

// بيانات المستخدم
$email = 'mo.askary@gmail.com';
$password = password_hash('newpassword', PASSWORD_BCRYPT);
$name = 'mo.askary';

// تحقق إذا كان المستخدم موجود مسبقاً
$user = $db->table('users')->where('email', $email)->first();
if ($user) {
    echo "المستخدم موجود بالفعل!\n";
} else {
    $db->table('users')->insert([
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ]);
    echo "تمت إضافة المستخدم بنجاح!\n";
}
