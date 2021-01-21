<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Buyer;
use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
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
            'id' => '1',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => hash::make('kantinku'),
            'role' => 'admin',
            'foto' => 'avatar-5.png',
        ]);
        User::insert([
                        'id' => '2',
                        'name' => 'penjual',
                        'email' => 'penjual@gmail.com',
                        'password' => hash::make('kantinku'),
                        'role' => 'seller',
                        'foto' => 'avatar-5.png',
        ]);
        Seller::insert([
            'id' => '2',
            'nama' => 'penjual',
            'user_id' => '2',
        ]);
        User::insert([
                        'id' => '3',
                        'name' => 'pembeli',
                        'email' => 'pembeli@gmail.com',
                        'password' => hash::make('kantinku'),
                        'role' => 'buyer',
                        'foto' => 'avatar-5.png',
        ]);
        Buyer::insert([
                'id' => '3',
                'nama' => 'pembeli',
                'user_id' => '3'
        ]);
    }
}