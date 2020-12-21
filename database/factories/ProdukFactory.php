<?php

namespace Database\Factories;

use App\Models\produk;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ProdukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = produk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
            'remember_token' => Str::random(10),
            'role' => 'buyer',
        ];
    }
}
