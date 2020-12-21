<?php

namespace Database\Factories;

use App\Models\seller;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use App\Models\user;
class SellerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = seller::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $user_id
        // return [
        //     'nama' => $this->faker->name,
        //     'jenis_kelamin' => Arr::random(['laki-laki','perempuan']),
        //     'alamat' => Str::random(10),
        //     'nama_toko' => Str::random(10), 
        //     'foto' => Str::random(10),
        //     'user_id' => Arr::random($user_id),
        // ];
    }
}
