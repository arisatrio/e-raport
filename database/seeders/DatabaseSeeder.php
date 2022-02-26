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
            RolesSeeder::class,
            UsersSeeder::class,
            MTahunAjaranSeeder::class,
            MJurusanSeeder::class,
            MEskulSeeder::class,
            MapelJurusanSeeder::class,
            MapelSeeder::class,
        ]);
    }
}
