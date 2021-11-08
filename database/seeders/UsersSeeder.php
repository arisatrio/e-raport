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
            'username' => 'admin123',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'role_id' => 1
        ]);
    }
}
