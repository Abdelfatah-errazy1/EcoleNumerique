<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('tables.etablissements.name'), function (Blueprint $table) {
            $table->id();

            $table->string(config('tables.etablissements.columns.name_AR'), 150)->nullable();
            $table->string(config('tables.etablissements.columns.name_FR'), 150)->nullable();
            $table->string(config('tables.etablissements.columns.address'), 150)->nullable();
            $table->string(config('tables.etablissements.columns.city'), 150)->nullable();
            $table->string(config('tables.etablissements.columns.postal_code'), 10)->nullable();
            $table->string(config('tables.etablissements.columns.country'), 150)->default('maroc');
            $table->string(config('tables.etablissements.columns.email'), 50)->nullable();
            $table->string(config('tables.etablissements.columns.web_site'), 150)->nullable();
            $table->string(config('tables.etablissements.columns.phone'), 15)->nullable();
            $table->string(config('tables.etablissements.columns.whatsapp'), 15)->nullable();
            $table->text(config('tables.etablissements.columns.logo'))->nullable();
            $table->text(config('tables.etablissements.columns.description_FR'))->nullable();
            $table->text(config('tables.etablissements.columns.description_AR'))->nullable();
//            $table->string(config('tables.etablissements.columns.directeur_FK'));
            $table->foreignId(config('tables.etablissements.columns.directeur_FK'))
                ->references(config('tables.directeure.columns.id'))
                ->on(config('tables.directeure.name'))
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
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
        Schema::dropIfExists(config('tables.etablissements.name'));
    }
};
