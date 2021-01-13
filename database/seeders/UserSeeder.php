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
        $SeederUser = User::insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => hash::make('admin123'),
            'role' => 'admin',
            'foto' => 'avatar-5.png',
        ]);
    }
}
