<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
                'phone' => '123-456-7890',
                'email' => 'example@email.com',
                'address' => '123 Example Street, Example City',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
