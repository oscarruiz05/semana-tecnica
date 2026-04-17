<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'oscarruiz2614@gmail.com'],
            [
                'name'     => 'Administrador',
                'email'    => 'oscarruiz2614@gmail.com',
                'password' => Hash::make('12345'),
            ]
        );
    }
}
