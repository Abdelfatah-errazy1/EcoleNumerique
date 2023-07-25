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
        Schema::create(config('tables.directeure.name'), function (Blueprint $table) {
            $table->id();
            $table->string(config('tables.directeure.columns.cin'), 10)->unique();
            $table->string(config('tables.directeure.columns.last_name'), 30)->nullable();
            $table->string(config('tables.directeure.columns.first_name'), 30)->nullable();
            $table->string(config('tables.directeure.columns.gender'), 2)->nullable();
            $table->string(config('tables.directeure.columns.civility'), 2)->nullable();
            $table->date(config('tables.directeure.columns.date_of_birth'))->nullable();
            $table->string(config('tables.directeure.columns.title_function'), 150)->nullable();
            $table->string(config('tables.directeure.columns.type'), 5)->nullable();
            $table->string(config('tables.directeure.columns.avatar'), 255)->nullable();
            $table->timestamp(config('tables.directeure.columns.date_creation'))->useCurrent();
            $table->timestamp(config('tables.directeure.columns.date_modification'))->nullable();
            $table->string(config('tables.directeure.columns.user_change'), 2)->nullable();
            $table->text(config('tables.directeure.columns.observation'))->nullable();
            $table->string(config('tables.directeure.columns.phone'), 15)->nullable();
            $table->string(config('tables.directeure.columns.fax'), 15)->nullable();
            $table->string(config('tables.directeure.columns.gsm'), 15)->nullable();
            $table->string(config('tables.directeure.columns.web_site'), 150)->nullable();
            $table->string(config('tables.directeure.columns.email'), 100)->nullable();
            $table->text(config('tables.directeure.columns.address'))->nullable();
            $table->string(config('tables.directeure.columns.city'), 100)->nullable();
            $table->string(config('tables.directeure.columns.postal_code'), 10)->nullable();
            $table->string(config('tables.directeure.columns.nationality'), 10)->nullable();
            $table->string(config('tables.directeure.columns.country'), 255)->nullable();
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
        Schema::dropIfExists(config('tables.directeure.name'));
    }
};
