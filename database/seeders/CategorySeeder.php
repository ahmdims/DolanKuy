<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categorys')->insert([
            ['name' => 'Wisata'],
            ['name' => 'Budaya'],
            ['name' => 'UMKM'],
            ['name' => 'Pegunungan'],
            ['name' => 'Pantai'],
            ['name' => 'Candi'],
            ['name' => 'Kuliner'],
            ['name' => 'Kerajinan'],
        ]);
    }
}
