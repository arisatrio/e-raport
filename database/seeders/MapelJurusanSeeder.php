<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\MJurusan;
use App\Models\MMapel;

class MapelJurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapelCsatu = [
            'Simulasi dan Komunikasi Digital',
            'Fisika Teknologi',
            'Kimia Teknologi'
        ];
        $jurTi = MJurusan::where('kode_jurusan', 'MM')->orWhere('kode_jurusan', 'TKJ')->pluck('id')->toArray();

        for($i = 0; $i < count($mapelCsatu); $i++) {
            //CREATE GURU
            $guru = User::with('guruMapel')->create([
                'name'      => 'Guru '. $mapelCsatu[$i],
                'username'  => 'gurujurusan'.$i+1,
                'email'     => 'gurujurusan'.$i.'@mail.com',
                'password'  => bcrypt('@123456'),
                'role_id'   => 3
            ]);

            //CREATE MAPEL
            MMapel::create([
                'm_jurusan_id'  => $jurTi[0],
                'guru_id'   => $guru->id,
                'golongan'  => 'C1. Dasar Bidang Keahlian',
                'mapel'     => $mapelCsatu[$i],
                'tingkat'   => 'X',
                'kkm'       => 75,
            ]);
            MMapel::create([
                'm_jurusan_id'  => $jurTi[1],
                'guru_id'   => $guru->id,
                'golongan'  => 'C1. Dasar Bidang Keahlian',
                'mapel'     => $mapelCsatu[$i],
                'tingkat'   => 'X',
                'kkm'       => 75,
            ]);
        }
    }
}
