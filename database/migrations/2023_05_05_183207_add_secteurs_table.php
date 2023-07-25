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
        Schema::create(config('tables.secteurs.name'), function (Blueprint $table) {
            $table->id();
            $table->string(config('tables.secteurs.columns.name_fr'),150);
            $table->string(config('tables.secteurs.columns.name_ar'),150)->nullable();
            $table->text(config('tables.secteurs.columns.description_fr'))->nullable()->comment('nom de secteur en francais');
            $table->text(config('tables.secteurs.columns.description_ar'))->nullable()->comment('nom de secteur en arabe');
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
        Schema::dropIfExists(config('tables.secteurs.name'));
    }
};
