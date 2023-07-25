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
        Schema::create('chapitres', function (Blueprint $table) {
                $table->bigInteger('idCh' , true , true);
                $table->string('numChap',20);
                $table->foreignId('matiere')
                ->constrained()
                ->references('idMat')
                ->on('matieres')
                ->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('nomFr',100);
                $table->string('nomAr',100)->nullable();
                $table->string('duree',50)->nullable();
                $table->string('descriptionFr');
                $table->string('descriptionAr');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapitres');
    }
};
