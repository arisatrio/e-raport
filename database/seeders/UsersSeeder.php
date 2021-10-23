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
            'username' => '12345678',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'role_id' => 1
        ]);

        User::create([
            'name' => 'Wali Kelas',
            'username' => '123',
            'email' => 'walikelas@mail.com',
            'password' => bcrypt('password'),
            'role_id' => 2
        ]);

        User::create([
            'name' => 'Guru',
            'username' => '456',
            'email' => 'guru@mail.com',
            'password' => bcrypt('password'),
            'role_id' => 3
        ]);

        User::create([
            'name' => 'Murid',
            'username' => '789',
            'email' => 'murid@mail.com',
            'password' => bcrypt('password'),
            'role_id' => 4
        ]);
    }
}
