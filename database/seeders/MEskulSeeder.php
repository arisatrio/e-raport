<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\MEskul;

class MEskulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eskul = ['Rohani Islam', 'Pramuka', 'Paskibra', 'Palang Merah Remaja', 'Futsal', 'Basket'];

        for($i = 0; $i < count($eskul); $i++) {
            MEskul::create([
                'nama_eskul'    => $eskul[$i],
            ]);
        }
    }
}
