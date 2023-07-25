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
        Schema::create(config('tables.centreformations.name'), function (Blueprint $table) {
            $table->id();
            $table->string(config('tables.centreformations.columns.name_AR'), 150)->nullable();
            $table->string(config('tables.centreformations.columns.name_FR'), 150)->nullable();
            $table->string(config('tables.centreformations.columns.address'), 150)->nullable();
            $table->string(config('tables.centreformations.columns.city'), 150)->nullable();
            $table->string(config('tables.centreformations.columns.postal_code'), 10)->nullable();
            $table->string(config('tables.centreformations.columns.country'), 150)->default('maroc');
            $table->string(config('tables.centreformations.columns.email'), 50)->nullable();
            $table->string(config('tables.centreformations.columns.web_site'), 150)->nullable();
            $table->string(config('tables.centreformations.columns.phone'), 15)->nullable();
            $table->string(config('tables.centreformations.columns.whatsapp'), 15)->nullable();
            $table->text(config('tables.centreformations.columns.logo'))->nullable();
            $table->text(config('tables.centreformations.columns.description_FR'))->nullable();
            $table->text(config('tables.centreformations.columns.description_AR'))->nullable();
//            $table->unsignedBigInteger(config('tables.centreformations.columns.etablissement_FK'))->nullable();

            $table->foreignId(config('tables.centreformations.columns.etablissement_FK'))
                ->references(config('tables.etablissements.columns.id'))
                ->on(config('tables.etablissements.name'))->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(config('tables.centreformations.name'));
    }
};
