<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roles;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create([
            'name' => 'Admin',
        ]);

        Roles::create([
            'name' => 'Wali Kelas',
        ]);

        Roles::create([
            'name' => 'Guru',
        ]);

        Roles::create([
            'name' => 'Murid',
        ]);

        Roles::create([
            'name' => 'Guru BK',
        ]);
    }
}
