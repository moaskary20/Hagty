<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate([
            'email' => 'mo.askary@gmail.com',
        ], [
            'name' => 'mo.askary',
            'password' => Hash::make('newpassword'),
        ]);
    }
}
