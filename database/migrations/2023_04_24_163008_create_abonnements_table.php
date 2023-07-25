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
        Schema::create(config('tables.abonnements.name'), function (Blueprint $table) {
            $table->id();
            $table->string(config('tables.abonnements.columns.title'), 150)->nullable();
            $table->float(config('tables.abonnements.columns.tarif_promo'))->nullable();
            $table->float(config('tables.abonnements.columns.tarif_vente'))->nullable();
            $table->string(config('tables.abonnements.columns.description'), 255)->nullable();
            $table->integer(config('tables.abonnements.columns.number_accounts_anseignants'))->nullable();
            $table->integer(config('tables.abonnements.columns.number_accounts_scolarite'))->nullable();
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
        Schema::dropIfExists(config('tables.abonnements.name'));
    }
};
