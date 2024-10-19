<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            $name = $faker->company . ' Park';
            DB::table('destinations')->insert([
                'name' => $name,
                'slug' => Str::slug($name),
                'description' => $faker->paragraph,
                'address' => $faker->address,
                'city' => $faker->city,
                'province' => $faker->state,
                'latitude' => $faker->latitude(-90, 90),
                'longitude' => $faker->longitude(-180, 180),
                'opening_time' => $faker->time('H:i:s'),
                'closing_time' => $faker->time('H:i:s'),
                'ticket_price' => $faker->numberBetween(10000, 50000),
                'facilities' => implode(', ', $faker->words(3)),
                'contact' => $faker->phoneNumber,
                'user_id' => 1, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}