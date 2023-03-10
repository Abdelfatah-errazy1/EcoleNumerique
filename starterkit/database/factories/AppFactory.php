<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\App>
 */
class AppFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id' =>$this->faker->uuid(),
            'name' =>$this->faker->name,
            'img' =>$this->faker->imageUrl,
            'package_name' =>$this->faker->uuid(),
        ];
    }
}
