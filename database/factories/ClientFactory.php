<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'first_name'=> $this->faker->name(),
            'last_name'=> $this->faker->name(),
            'username'=> $this->faker->unique()->bothify(),
            'email' => $this->faker->unique()->safeEmail(),
            'password'=> app('hash')->make('1234567890'),

        ];
    }
}
