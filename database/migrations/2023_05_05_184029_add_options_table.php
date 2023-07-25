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
        Schema::create(config('tables.options.name'), function (Blueprint $table) {
            $table->id();
            $table->string(config('tables.options.columns.code'),20);
            $table->foreignId(config('tables.options.columns.fk_secteur'))
                ->constrained()
                ->references(config('tables.secteurs.columns.id'))
                ->on(config('tables.secteurs.name'))
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string(config('tables.options.columns.name_fr'),150);
            $table->string(config('tables.options.columns.name_ar'),150)->nullable();
            $table->text(config('tables.options.columns.description_fr'))->nullable();
            $table->text(config('tables.options.columns.description_ar'))->nullable();

            $table->foreignId(config('tables.options.columns.fk_etablissement'))
                ->nullable()
                ->constrained()
                ->references(config('tables.etablissements.columns.id'))
                ->on(config('tables.etablissements.name'))
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
        Schema::dropIfExists(config('tables.options.name'));
    }
};
