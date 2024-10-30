<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CultureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            $name = $faker->company;
            DB::table('culutres')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
