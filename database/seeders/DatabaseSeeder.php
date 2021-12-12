<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LotSeeder::class,
            SellerSeeder::class,
            CustomerSeeder::class,
            ProductSeeder::class,
            ColorSeeder::class,
            ProductColorSeeder::class
        ]);
    }
}
