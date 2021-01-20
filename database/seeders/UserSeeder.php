<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => hash::make('kantinku'),
            'role' => 'admin',
            'foto' => 'avatar-5.png',
        ]);
        User::insert([
            'name' => 'penjual',
            'email' => 'penjual@gmail.com',
            'password' => hash::make('kantinku'),
            'role' => 'seller',
            'foto' => 'avatar-5.png',
        ]);
        User::insert([
            'name' => 'pembeli',
            'email' => 'pembeli@gmail.com',
            'password' => hash::make('kantinku'),
            'role' => 'buyer',
            'foto' => 'avatar-5.png',
        ]);
    }
}