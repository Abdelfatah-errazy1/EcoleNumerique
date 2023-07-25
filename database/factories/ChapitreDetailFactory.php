<?php

namespace Database\Factories;

use App\Models\Chapitre;
use App\Models\ChapitreDetail;
use App\Traits\SweetFactoryHelpers;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ChapitreDetail>
 */
class ChapitreDetailFactory extends Factory
{
    use SweetFactoryHelpers;



    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $chapitre = $this->createForeignKey(config('tables.chapitres.name') , Chapitre::class);
        return [
            config('tables.chapitre_details.columns.title_fr') => fake()->title(),
            config('tables.chapitre_details.columns.code') => fake()->postcode,
            config('tables.chapitre_details.columns.description_fr') => fake()->title,
            config('tables.chapitre_details.columns.description_ar') => $this->arabicFake()->title,
            config('tables.chapitre_details.columns.fk_chapitres') => $chapitre,
        ];
    }


}
