<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('👤 إنشاء المستخدمين...');

        // إنشاء المستخدم المطلوب
        User::updateOrCreate(
            ['email' => 'mo.askary@gmail.com'],
            [
                'name' => 'Mohamed Askary',
                'email' => 'mo.askary@gmail.com',
                'password' => Hash::make('NEWPASSWORD'),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );

        $this->command->info('✅ تم إنشاء المستخدم بنجاح! 🎉');
        $this->command->info('📧 الإيميل: mo.askary@gmail.com');
        $this->command->info('🔑 كلمة المرور: NEWPASSWORD');
    }
}
