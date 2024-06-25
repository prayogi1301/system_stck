<?php

use App\Seri;
use Illuminate\Database\Seeder;

class SeriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seri::create([
            'no_seri' => '0101',
        ]);
        Seri::create([
            'no_seri' => '0102',
        ]);
        Seri::create([
            'no_seri' => '0103',
        ]);
    }
}
