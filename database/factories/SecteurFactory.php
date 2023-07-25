<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Secteur>
 */
class SecteurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            config('tables.secteurs.columns.name_fr') => fake()->name,
            config('tables.secteurs.columns.name_ar') => fake('ar_JO')->name,
            config('tables.secteurs.columns.description_fr') => fake()->slug,
            config('tables.secteurs.columns.description_ar') => fake('ar_JO')->slug,
        ];
    }
}
