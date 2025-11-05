<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'rajan@gmail.com'],
            [
                'name' => 'Rajan Sharma',
                'password' => Hash::make('rajan@8468'),
            ]
        );
    }
}
