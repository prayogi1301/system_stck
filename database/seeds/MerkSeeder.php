<?php

use App\Merk;
use Illuminate\Database\Seeder;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Merk::create([
            'nama_merk' => 'Honda'
        ]);
        Merk::create([
            'nama_merk' => 'Yamaha'
        ]);
        Merk::create([
            'nama_merk' => 'Suzuki'
        ]);
        Merk::create([
            'nama_merk' => 'Kawasaki'
        ]);
    }
}
