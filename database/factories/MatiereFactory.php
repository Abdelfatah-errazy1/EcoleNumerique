<?php

namespace Database\Factories;

use App\Models\Module;
use App\Models\Option;
use App\Models\Periode;
use App\Models\Secteur;
use App\Traits\SweetFactoryHelpers;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PhpParser\Node\Expr\AssignOp\Mod;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Matiere>
 */
class MatiereFactory extends Factory
{
    use SweetFactoryHelpers;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $periode = $this->createForeignKey(config('tables.periodes.name'), Periode::class);
        $module = $this->createForeignKey(config('tables.modules.name'), Module::class);
        return [
            config('tables.matieres.columns.code') => fake()->postcode,
            config('tables.matieres.columns.fk_modules') => $module,
            config('tables.matieres.columns.fk_periodes') => $periode,
            config('tables.matieres.columns.name_fr') => fake()->name,
            config('tables.matieres.columns.name_ar') => $this->arabicFake()->name,
            config('tables.matieres.columns.duration') => '36h40',
            config('tables.matieres.columns.coefficient') => fake()->randomFloat(0, 100),
            config('tables.matieres.columns.description_fr') => fake()->address,
            config('tables.matieres.columns.description_ar') => $this->arabicFake()->address,

        ];
    }
}
