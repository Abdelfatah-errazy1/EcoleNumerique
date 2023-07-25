<?php

namespace Database\Factories;

use App\Models\Option;
use App\Models\Secteur;
use App\Traits\SweetFactoryHelpers;
use App\Traits\UseFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Filiere>
 */
class FiliereFactory extends Factory
{
    use SweetFactoryHelpers;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $optionsId = $this->createForeignKey(config('tables.options.name'), Option::class);


        return [
            config('tables.filieres.columns.code') => fake()->postcode,
            config('tables.filieres.columns.name_fr') => fake()->name,
            config('tables.filieres.columns.fk_options') => $optionsId,
        ];
    }
}
