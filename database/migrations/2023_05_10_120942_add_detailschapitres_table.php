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
        Schema::create(config('tables.chapitre_details.name'), function (Blueprint $table) {
            $table->id();

            $table->string(config('tables.chapitre_details.columns.code'),20);
            $table->string(config('tables.chapitre_details.columns.title_fr'),100);
            $table->string(config('tables.chapitre_details.columns.title_ar'),100)->nullable();
            $table->string(config('tables.chapitre_details.columns.description_fr'));
            $table->string(config('tables.chapitre_details.columns.description_ar'));

            $table->foreignId(config('tables.chapitre_details.columns.fk_chapitres'))
                ->constrained()
                ->references(config('tables.chapitres.columns.id'))
                ->on(config('tables.chapitres.name'))
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
        Schema::dropIfExists(config('tables.chapitre_details.name'));
    }
};
