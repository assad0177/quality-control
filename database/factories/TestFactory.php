<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'description'=>$this->faker->sentence(),
            'status'=>$this->faker->boolean(),
            'icon'=>$this->faker->image("public/assets/images",640,480,null,false),
            'image'=>$this->faker->image("public/assets/images",640,480,null,false),
        ];
    }
}

