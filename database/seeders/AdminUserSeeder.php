<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@hagty.com'],
            [
                'name' => 'مدير النظام',
                'email' => 'admin@hagty.com',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );
        
        User::updateOrCreate(
            ['email' => 'mohamed@hagty.com'],
            [
                'name' => 'محمد',
                'email' => 'mohamed@hagty.com',
                'password' => Hash::make('mohamed123'),
                'email_verified_at' => now(),
            ]
        );
    }
}
