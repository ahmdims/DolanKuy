<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            WebsiteSeeder::class,
            FaqSeeder::class,
            CategorySeeder::class,
            DestinationSeeder::class,
            MsmeSeeder::class,
            CultureSeeder::class,
        ]);
    }
}
