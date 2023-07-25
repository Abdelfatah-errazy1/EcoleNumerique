<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EtablissementFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name_AR' => $this->faker->name(),
            'name_FR' => $this->faker->name(),
            'address' => $this->faker->address(),
            'city' => $this->faker->city(),
            'postal_code' => $this->faker->postcode(),
            'country' => $this->faker->country(),
            'email' => $this->faker->unique()->safeEmail(),
            'web_site' => $this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'whatsapp' => $this->faker->word(),
            'logo' => $this->faker->word(),
            'description_FR' => $this->faker->text(),
            'description_AR' => $this->faker->text(),
            'directeur_fk' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
