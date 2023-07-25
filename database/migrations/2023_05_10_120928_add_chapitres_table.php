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
        Schema::create(config('tables.chapitres.name'), function (Blueprint $table) {
            $table->id();
            $table->string(config('tables.chapitres.columns.reference'), 20);
            $table->string(config('tables.chapitres.columns.name_fr'), 100)->nullable();
            $table->string(config('tables.chapitres.columns.name_ar'))->nullable();
            $table->string(config('tables.chapitres.columns.description_fr'));
            $table->string(config('tables.chapitres.columns.description_ar'));
            $table->foreignId(config('tables.chapitres.columns.fk_matieres'))
                ->constrained()
                ->references(config('tables.matieres.columns.id'))
                ->on(config('tables.matieres.name'))
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
        Schema::dropIfExists(config('tables.chapitres.name'));
    }
};
