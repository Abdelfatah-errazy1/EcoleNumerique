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
        Schema::create('modules', function (Blueprint $table) {
         
            $table->bigInteger('idM' , true , true);
            $table->string('codeMod',20);
            $table->foreignId('filliereniveau')
            ->constrained()
            ->references('id')
            ->on('filliereNiveau')
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
        Schema::dropIfExists('modules');
    }
};
