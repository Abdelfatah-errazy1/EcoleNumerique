<?php

namespace Database\Factories;

use App\Models\Filiere;
use App\Models\FilliereNiveau;
use App\Models\Secteur;
use App\Traits\SweetFactoryHelpers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Periode>
 */
class PeriodeFactory extends Factory
{
    use SweetFactoryHelpers;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fk = $this->createForeignKey(config('tables.filieres.name'), Filiere::class);

        return [
            config('tables.periodes.columns.name') => fake()->unique()->name(),
            config('tables.periodes.columns.code') => fake()->postcode,
            config('tables.periodes.columns.fk_filieres') => $fk
        ];
    }
}
