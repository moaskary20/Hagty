<?php
// سكريبت لإضافة مستخدم جديد بكلمة مرور مشفرة
$database = new PDO('sqlite:database/database.sqlite');

$name = 'Test User';
$email = 'testuser@example.com';
$password = password_hash('test12345', PASSWORD_BCRYPT);

$stmt = $database->prepare("INSERT INTO users (name, email, password, created_at, updated_at) VALUES (:name, :email, :password, datetime('now'), datetime('now'))");
$stmt->execute(['name' => $name, 'email' => $email, 'password' => $password]);

if ($stmt->rowCount()) {
    echo "User created successfully!\n";
} else {
    echo "Failed to create user.\n";
}
