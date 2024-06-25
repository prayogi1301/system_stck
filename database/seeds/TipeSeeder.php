<?php

use App\Tipe;
use Illuminate\Database\Seeder;

class TipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipe::create([
            'nama_tipe' => 'Vario',
            'jenis' => 'Sepeda Motor',
            'model' => 'Solo',
            'tahun_buat' => '2021',
            'besar_cc' => '125',
            'no_rangka' => 'MHX1000',
            'no_mesin' => 'MMB008',
            'warna' => 'Hitam',
            'bahan_bakar' => 'Bensin'
        ]);
        Tipe::create([
            'nama_tipe' => 'Beat',
            'jenis' => 'Sepeda Motor',
            'model' => 'Solo',
            'tahun_buat' => '2021',
            'besar_cc' => '110',
            'no_rangka' => 'MHX1000',
            'no_mesin' => 'MMB008',
            'warna' => 'Putih',
            'bahan_bakar' => 'Bensin'
        ]);
        Tipe::create([
            'nama_tipe' => 'Mio Soul',
            'jenis' => 'Sepeda Motor',
            'model' => 'Solo',
            'tahun_buat' => '2021',
            'besar_cc' => '110',
            'no_rangka' => 'MHX1010',
            'no_mesin' => 'MMB010',
            'warna' => 'Hitam',
            'bahan_bakar' => 'Bensin'
        ]);
        Tipe::create([
            'nama_tipe' => 'Mio J',
            'jenis' => 'Sepeda Motor',
            'model' => 'Solo',
            'tahun_buat' => '2021',
            'besar_cc' => '110',
            'no_rangka' => 'MHX2010',
            'no_mesin' => 'MMB020',
            'warna' => 'Putih',
            'bahan_bakar' => 'Bensin'
        ]);
    }
}
