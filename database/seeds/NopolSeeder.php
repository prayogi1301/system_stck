<?php

use App\Nopol;
use Illuminate\Database\Seeder;

class NopolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nopol::create([
            'nopola' => 'M',
            'nopolb' => '1000',
            'nopolc' => 'XX',
            'nopol' => 'M1000XX'
        ]);
        Nopol::create([
            'nopola' => 'M',
            'nopolb' => '2000',
            'nopolc' => 'XX',
            'nopol' => 'M2000XX'
        ]);
        Nopol::create([
            'nopola' => 'M',
            'nopolb' => '3000',
            'nopolc' => 'XXX',
            'nopol' => 'M3000XXX'
        ]);
        Nopol::create([
            'nopola' => 'M',
            'nopolb' => '4000',
            'nopolc' => 'WJ',
            'nopol' => 'M4000WJ'
        ]);
    }
}
