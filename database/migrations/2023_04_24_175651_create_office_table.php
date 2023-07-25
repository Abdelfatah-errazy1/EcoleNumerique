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
        Schema::create(config('tables.office.name'), function (Blueprint $table) {
            $table->id();
            $table->dateTime(config('tables.office.columns.last_seen'))->nullable();
            $table->string(config('tables.office.columns.status'), 3)->default('A')->nullable();
            $table->string(config('tables.office.columns.role'), 3)->nullable();
            $table->string(config('tables.office.columns.login'), 150)->nullable();
            $table->dateTime(config('tables.office.columns.date_creation'))->default(now())->nullable();
            $table->dateTime(config('tables.office.columns.date_last_update'))->nullable();
            $table->string(config('tables.office.columns.password'), 255)->nullable();
            $table->string(config('tables.office.columns.code_generate'), 255)->nullable();
            $table->dateTime(config('tables.office.columns.gendered_time'))->nullable();
            $table->dateTime(config('tables.office.columns.last_password_change'))->nullable();
            $table->string(config('tables.office.columns.original_password'), 1)->default('Y')->nullable();
            $table->string(config('tables.office.columns.is_connected'), 1)->default('Y')->nullable();
            $table->string(config('tables.office.columns.token'), 100)->nullable();
            $table->foreignId(config('tables.office.columns.centreformabon_FK'))
                ->references(config('tables.centreformationsabonnement.columns.id'))
                ->on(config('tables.centreformationsabonnement.name'))
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId(config('tables.office.columns.collaborateur_FK'))
                ->references(config('tables.collaborateurs.columns.id'))
                ->on(config('tables.collaborateurs.name'))
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
        Schema::dropIfExists(config('tables.office.name'));
    }
};
