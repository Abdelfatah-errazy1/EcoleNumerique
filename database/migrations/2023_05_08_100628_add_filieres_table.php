<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('tables.filieres.name'), function (Blueprint $table) {
            $table->id(config('tables.filieres.columns.id'))->comment("pk auto incrémente");
            $table->string(config('tables.filieres.columns.code'), 20)->comment("code abrégé de la filière (DEVOWFS)");
            $table->string(config('tables.filieres.columns.name_fr'), 150)->comment("nom de fillière en francais");
            $table->string(config('tables.filieres.columns.name_ar'), 150)->nullable()->comment("nom de fillière en arabe");
            $table->string(config('tables.filieres.columns.niveau'))->nullable()->comment("Texte Expliquant le niveau de diplôme ou de certificat obtenu après la complétion de la filière");
            $table->string(config('tables.filieres.columns.diplome_fr'), 150)->nullable()->comment("Le diplôme ou la certification associée à la filière");
            $table->string(config('tables.filieres.columns.diplome_ar'), 150)->nullable()->comment("Le diplôme ou la certification associée à la filière");
            $table->string(config('tables.filieres.columns.conditions_ad_fr'))->nullable()->comment("les exigences d'admission à la filière");
            $table->string(config('tables.filieres.columns.conditions_ad_ar'))->nullable()->comment("les exigences d'admission à la filière");
            $table->string(config('tables.filieres.columns.description_fr'))->nullable()->comment("l'objectif de la filière");
            $table->string(config('tables.filieres.columns.description_ar'))->nullable()->comment("l'objectif de la filière");
            $table->foreignId(config('tables.filieres.columns.fk_options'))
                ->constrained()
                ->references(config('tables.options.columns.id'))
                ->on(config('tables.options.name'))
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('tables.filieres.name'));

    }
};
