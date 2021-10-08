<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'role_id' => 1
        ]);

        User::create([
            'name' => 'Wali Kelas',
            'email' => 'walikelas@mail.com',
            'password' => bcrypt('password'),
            'role_id' => 2
        ]);

        User::create([
            'name' => 'Guru',
            'email' => 'guru@mail.com',
            'password' => bcrypt('password'),
            'role_id' => 3
        ]);

        User::create([
            'name' => 'Murid',
            'email' => 'murid@mail.com',
            'password' => bcrypt('password'),
            'role_id' => 4
        ]);
    }
}
