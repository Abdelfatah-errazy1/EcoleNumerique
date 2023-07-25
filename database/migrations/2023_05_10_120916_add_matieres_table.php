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
        Schema::create(config('tables.matieres.name'), function (Blueprint $table) {
            $table->id();
            $table->string(config('tables.matieres.columns.code'), 20);
            $table->string(config('tables.matieres.columns.name_fr'), 100);
            $table->string(config('tables.matieres.columns.name_ar'), 100)->nullable();
            $table->string(config('tables.matieres.columns.duration'), 50)->nullable();
            $table->double(config('tables.matieres.columns.coefficient'));
            $table->text(config('tables.matieres.columns.description_fr'));
            $table->text(config('tables.matieres.columns.description_ar'));
            $table->foreignId(config('tables.matieres.columns.fk_modules'))
                ->constrained()
                ->references(config('tables.modules.columns.id'))
                ->on(config('tables.modules.name'))
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId(config('tables.matieres.columns.fk_periodes'))
                ->nullable()
                ->constrained()
                ->references(config('tables.modules.columns.id'))
                ->on(config('tables.periodes.name'))
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
        Schema::dropIfExists(config('tables.matieres.name'));
    }
};
