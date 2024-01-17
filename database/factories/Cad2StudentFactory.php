<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cad2City;
use App\Models\Cad2User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cad2Student>
 */
class Cad2StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'adress' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'd_o_b' => fake()->date('Y-m-d', '2005-01-01'),
            'city_id' => Cad2City::all()->random()->id,
            'user_id' => Cad2User::factory()
        ];
    }
}
