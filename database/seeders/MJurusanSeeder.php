<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\MJurusan;

class MJurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jurusan = ['Multimedia', 'Akuntansi', 'Tata Boga', 'Tata Busana', 'Teknik Kendaraan Ringan', 'Teknik Komputer dan Jaringan'];
        $singkatan = ['MM', 'AKN', 'TBO', 'TBA', 'TKR', 'TKJ'];

        $tingkat = ['X', 'XI', 'XII'];

        for($i = 0; $i < count($jurusan); $i++) {
            $jur = MJurusan::with('kelasJurusan')->create([
                'jurusan'       => $jurusan[$i],
                'kode_jurusan'  => $singkatan[$i],
            ]);

            for($j = 0; $j < count($tingkat); $j++) {
                $jur->kelasJurusan()->create([
                    'tingkat'   => $tingkat[$j],
                    'ruangan'   => 'Satu',
                ]);
            }
        }
    }
}
