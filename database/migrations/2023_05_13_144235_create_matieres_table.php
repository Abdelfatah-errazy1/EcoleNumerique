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
        Schema::create('matieres', function (Blueprint $table) {
         
                $table->bigInteger('idMat' , true , true);
                $table->string('codeMa',20);
                $table->foreignId('module')
                ->constrained()
                ->references('idM')
                ->on('modules')
                ->cascadeOnUpdate();
    
                $table->foreignId('periode')
                ->constrained()
                ->references('idP')
                ->on('periodes')
                ->cascadeOnUpdate()->cascadeOnDelete();
                $table->string('nomFr',100);
                $table->string('nomAr',100)->nullable();
                $table->string('duree',50)->nullable();
                $table->float('coef');
                $table->text('descriptionFr');
                $table->text('descriptionAr');
            });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matieres');
    }
};
