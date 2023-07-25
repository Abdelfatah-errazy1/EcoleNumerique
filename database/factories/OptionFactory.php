<?php

namespace Database\Factories;

use App\Models\Secteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Option>
 */
class OptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $secteurId = null;
        if (\Schema::hasTable(config('tables.secteurs.name'))) {
            $secteur = Secteur::query()->first();
            if ($secteur !== null) {
                $secteurId = $secteur[config('tables.secteurs.columns.id')];
            } else {
                $secteurId = Secteur::factory()->create()->first()[config('tables.secteurs.columns.id')];
            }
        }

        return [
            config('tables.options.columns.fk_secteur')  => $secteurId,
            config('tables.options.columns.code') => fake()->userName,
            config('tables.options.columns.name_fr') => fake()->name,
            config('tables.options.columns.name_ar') => fake('ar_JO')->name,
            config('tables.options.columns.description_fr') => fake()->slug,
            config('tables.options.columns.description_ar') => fake('ar_JO')->slug,
        ];
    }
}
