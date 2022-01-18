<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerminalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username'=> $this->faker->unique()->bothify(),
            'password'=> app('hash')->make('1234567890'),
            'client_id'=>Client::all('id')->random()->id,
            'plan_id'=>Plan::all('id')->random()->id,
        ];
    }
}
