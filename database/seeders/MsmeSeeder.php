<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class MsmeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menggunakan Faker untuk data acak
        $faker = Faker::create();

        for ($i = 1; $i <= 20; $i++) {
            $name = $faker->company;
            DB::table('msmes')->insert([
                'name' => $faker->company,
                'slug' => Str::slug($name),
                'msmes_type' => $faker->randomElement(['Food', 'Craft', 'Service', 'Retail']),
                'description' => $faker->paragraph,
                'address' => $faker->address,
                'city' => $faker->city,
                'province' => $faker->state,
                'latitude' => $faker->latitude(-90, 90),
                'longitude' => $faker->longitude(-180, 180),
                'opening_time' => $faker->time('H:i:s'),
                'closing_time' => $faker->time('H:i:s'),
                'ticket_price' => $faker->numberBetween(10000, 50000),
                'facilities' => $faker->sentence,
                'contact' => $faker->phoneNumber,
                'profile_photo' => $faker->imageUrl(640, 480, 'business', true, 'Faker'),
                'rating' => $faker->numberBetween(1, 5),
                'updated_at' => now(),
            ]);
        }
    }
}