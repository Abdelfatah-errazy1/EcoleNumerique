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
        Schema::create('periodes', function (Blueprint $table) {
            $table->bigInteger('idP' , true , true);
            $table->string('codeP');
           
            $table->foreignId('filliereNiveau')
            ->constrained()
            ->references('id')
            ->on('filliereniveau')
            ->cascadeOnUpdate()->cascadeOnDelete();

            $table->string('nomP');
            
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodes');
    }
};
