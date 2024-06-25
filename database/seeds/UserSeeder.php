<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin Donk',
            'email' => 'admin@stck.com',
            'password' => bcrypt('123456')
        ]);
        $user->assignRole('admin');
        $user2 = User::create([
            'name' => 'User',
            'email' => 'user@stck.com',
            'password' => bcrypt('123456')
        ]);
        $user2->assignRole('user');
    }
}
