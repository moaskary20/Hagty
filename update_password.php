<?php
// update_password.php
// سكريبت لتحديث كلمة مرور مستخدم وتشفيرها باستخدام bcrypt

// إعدادات الاتصال بقاعدة البيانات (تأكد من صحتها)
$database = new PDO('sqlite:database/database.sqlite'); // عدل هذا السطر إذا كنت تستخدم MySQL أو غيره

$email = 'mo.askary@gmail.com';
$newPassword = 'newpassword';
$hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

// تحديث كلمة المرور
$stmt = $database->prepare("UPDATE users SET password = :password WHERE email = :email");
$stmt->execute(['password' => $hashedPassword, 'email' => $email]);

if ($stmt->rowCount()) {
    echo "Password updated successfully!\n";
} else {
    echo "No user found or password not updated.\n";
}
