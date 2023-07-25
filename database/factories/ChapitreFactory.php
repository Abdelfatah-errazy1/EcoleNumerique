<?php

namespace Database\Factories;


use App\Models\Matiere;
use App\Traits\SweetFactoryHelpers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chapitre>
 */
class ChapitreFactory extends Factory
{
    use SweetFactoryHelpers;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $matier = $this->createForeignKey(config('tables.matieres.name'), Matiere::class);
        return [

            config('tables.chapitres.columns.reference') => fake()->userName(),
            config('tables.chapitres.columns.description_fr') => fake()->text,
            config('tables.chapitres.columns.description_ar') => $this->arabicFake()->name,
            config('tables.chapitres.columns.fk_matieres') => $matier
        ];
    }
}
