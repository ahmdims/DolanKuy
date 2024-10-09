<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menambahkan user admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'role' => 'superadmin',
            'remember_token' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        for ($i = 1; $i <= 20; $i++) {
            DB::table('users')->insert([
                'name' => 'User ' . $i,
                'username' => 'user' . $i,
                'email' => 'user' . $i . '@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'pengunjung',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
