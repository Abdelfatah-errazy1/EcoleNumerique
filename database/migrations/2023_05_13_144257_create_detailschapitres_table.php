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
        Schema::create('detailschapitres', function (Blueprint $table) {
           
            $table->bigInteger('idDC' , true , true);
            $table->string('code',20);
            $table->foreignId('chapitre')
            ->constrained()
            ->references('idCh')
            ->on('chapitres')
            ->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('titreFr',100);
            $table->string('titreAr',100)->nullable();
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
        Schema::dropIfExists('detailschapitres');
    }
};
