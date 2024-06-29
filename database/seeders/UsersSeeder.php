<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Membuat pengguna admin jika belum ada
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password')
            ]
        );

        // Membuat pengguna biasa jika belum ada
        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'Regular User',
                'password' => Hash::make('password')
            ]
        );

        // Menambahkan peran ke pengguna jika belum ada
        if (!$admin->hasRole('admin')) {
            $admin->assignRole('admin');
        }

        if (!$user->hasRole('user')) {
            $user->assignRole('user');
        }
    }
}
