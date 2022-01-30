<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\MTahunAjaran;

class MTahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MTahunAjaran::create([
            'tahun_ajaran'  => '2021/2022',
            'semester'      => 'Genap',
            'status'        => 1,
        ]);
    }
}
