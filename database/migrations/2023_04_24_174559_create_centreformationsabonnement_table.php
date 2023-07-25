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
        Schema::create(config('tables.centreformationsabonnement.name'), function (Blueprint $table) {
            $table->id();

            $table->date(config('tables.centreformationsabonnement.columns.date_end'))->nullable();
            $table->date(config('tables.centreformationsabonnement.columns.date_start'))->nullable();
            $table->string(config('tables.centreformationsabonnement.columns.state'), 5)->default('ABN')->nullable();


            $table->foreignId((config('tables.centreformationsabonnement.columns.abonnement_Fk')))
                ->references(config('tables.abonnements.columns.id'))
                ->on(config('tables.abonnements.name'))
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId(config('tables.centreformationsabonnement.columns.admin_FK'))
                ->references(config('tables.admins.columns.id'))
                ->on(config('tables.admins.name'))
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId(config('tables.centreformationsabonnement.columns.center_FK'))
                ->references(config('tables.centreformations.columns.id'))
                ->on(config('tables.centreformations.name'))
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
        Schema::dropIfExists(config('tables.centreformationsabonnement.name'));
    }
};
