<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebsiteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('websites')->insert([
            [
                'phone' => '123-456-7890',
                'email' => 'example@email.com',
                'address' => '123 Example Street, Example City',
                'video' => 'https://www.youtube.com/embed/nWNjqkZxiMA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
