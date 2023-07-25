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
        Schema::create(config('tables.periodes.name'), function (Blueprint $table) {
            $table->id();



            $table->string(config('tables.periodes.columns.code'),10);
            $table->string(config('tables.periodes.columns.name'),50);

            $table->date(config('tables.periodes.columns.start_date'))->nullable();
            $table->date(config('tables.periodes.columns.end_date'))->nullable();
            $table->text(config('tables.periodes.columns.description'))->nullable();


            $table->foreignId(config('tables.periodes.columns.fk_filieres'))
                ->constrained()
                ->references(config('tables.filieres.columns.id'))
                ->on(config('tables.filieres.name'))
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
        Schema::dropIfExists(config('tables.periodes.name'));
    }
};
