<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'utype' => 'superadmin',
            'remember_token' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        for ($i = 1; $i <= 20; $i++) {
            DB::table('users')->insert([
                'name' => 'Pengunjung ' . $i,
                'username' => 'pengunjung' . $i,
                'email' => 'pengunjung' . $i . '@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'utype' => 'pengunjung',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            DB::table('users')->insert([
                'name' => 'Admin Wisata ' . $i,
                'username' => 'adminwisata' . $i,
                'email' => 'adminwisata' . $i . '@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'utype' => 'admin_wisata',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            DB::table('users')->insert([
                'name' => 'Admin UMKM ' . $i,
                'username' => 'adminumkm' . $i,
                'email' => 'adminumkm' . $i . '@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'utype' => 'admin_umkm',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            DB::table('users')->insert([
                'name' => 'Admin Budaya ' . $i,
                'username' => 'adminbudaya' . $i,
                'email' => 'adminbudaya' . $i . '@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'utype' => 'admin_budaya',
                'remember_token' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
