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
        Schema::create(config('tables.collaborateurs.name'), function (Blueprint $table) {

            $table->id();
            $table->string(config('tables.collaborateurs.columns.matricule'), 50);
            $table->string(config('tables.collaborateurs.columns.cin'), 10)->unique()->nullable();
            $table->string(config('tables.collaborateurs.columns.last_name'), 100)->nullable();
            $table->string(config('tables.collaborateurs.columns.first_name'), 100)->nullable();
            $table->date(config('tables.collaborateurs.columns.birthday'))->nullable();
            $table->char(config('tables.collaborateurs.columns.gender'), 1)->default('H')->nullable();
            $table->string(config('tables.collaborateurs.columns.civility'), 2)->default('H')->nullable();
            $table->string(config('tables.collaborateurs.columns.fonction'), 150)->nullable();
            $table->string(config('tables.collaborateurs.columns.avatar'), 255)->nullable();
            $table->string(config('tables.collaborateurs.columns.phone_number'), 150)->nullable();
            $table->string(config('tables.collaborateurs.columns.email'), 150)->nullable();
            $table->string(config('tables.collaborateurs.columns.city'), 150)->nullable();
            $table->string(config('tables.collaborateurs.columns.postal_code'), 10)->nullable();
            $table->text(config('tables.collaborateurs.columns.address'))->nullable();
            $table->text(config('tables.collaborateurs.columns.observation'))->nullable();
            $table->string(config('tables.collaborateurs.columns.category'))->nullable();
            $table->string(config('tables.collaborateurs.columns.nature_contrat'))->nullable();
//            $table->unsignedBigInteger(config('tables.collaborateurs.columns.center_FK'));
            $table->foreignId(config('tables.collaborateurs.columns.center_FK'))
                ->nullable()
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
        Schema::dropIfExists(config('tables.collaborateurs.name'));
    }
};
