<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\MMapel;
use App\Models\User;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mapelA = [
            'Pendidikan Agama dan Budi Pekerti',
            'Pendidikan Pancasila dan Kewarganegaraan',
            'Bahasa Indonesia',
            'Matematika',
            'Sejarah Indonesia',
            'Bahasa Inggris',
        ];

        $mapelB = [
            'Seni Budaya',
            'Prakarya dan Kewirausahaan',
            'Pendidikan Jasmani, Olah Raga dan Kesehatan',
        ];

        $tingkat = ['X', 'XI', 'XII'];

        //GOLONGAN A
        for($i = 0; $i < count($mapelA); $i++) {

            //CREATE GURU
            $guru = User::with('guruMapel')->create([
                'name'      => 'Guru '. $mapelA[$i],
                'username'  => 'guru'.$i+1,
                'email'     => 'guru'.$i.'@mail.com',
                'password'  => bcrypt('@123456'),
                'role_id'   => 3
            ]);

            for($j = 0; $j < count($tingkat); $j++) {
                MMapel::create([
                    'guru_id'   => $guru->id,
                    'golongan'  => 'A. Muatan Nasional',
                    'mapel'     => $mapelA[$i],
                    'tingkat'   => $tingkat[$j],
                    'kkm'       => 75,
                ]);
            }
        }

        //GOLONGAN B
        for($i = 0; $i < count($mapelB); $i++) {

            //CREATE GURU
            $guru = User::with('guruMapel')->create([
                'name'      => 'Guru '. $mapelB[$i],
                'username'  => 'gurumapelb'.$i+1,
                'email'     => 'guru_b_'.$i.'@mail.com',
                'password'  => bcrypt('@123456'),
                'role_id'   => 3
            ]);

            for($j = 0; $j < count($tingkat); $j++) {
                MMapel::create([
                    'guru_id'   => $guru->id,
                    'golongan'  => 'B. Muatan Kewilayahan',
                    'mapel'     => $mapelB[$i],
                    'tingkat'   => $tingkat[$j],
                    'kkm'       => 75,
                ]);
            }
        }
    }
}
