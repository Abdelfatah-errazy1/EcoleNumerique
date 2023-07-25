<?php

namespace Database\Factories;


use App\Models\Option;
use App\Models\Secteur;
use App\Traits\SweetFactoryHelpers;
use Dflydev\DotAccessData\Data;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Module>
 */
class ModuleFactory extends Factory
{
    use SweetFactoryHelpers;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        $option_id = $this->createForeignKey(config('tables.modules.name'), Option::class);

        return [
            config('tables.modules.columns.code') => fake()->postcode,
            config('tables.modules.columns.name_fr') => fake()->name(),
            config('tables.modules.columns.name_ar') => $this->arabicFake()->name,
            config('tables.modules.columns.coefficient') => fake()->randomFloat(0,100),
            config('tables.modules.columns.description_fr') =>fake()->name() ,
            config('tables.modules.columns.description_ar') => $this->arabicFake()->name,
            config('tables.modules.columns.fk_options') => $option_id

        ];

    }
}
