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
        Schema::create('salles', function (Blueprint $table) {
            $table->id();
            $table->string('codeS',20);
            $table->string('titre',100);
            $table->integer('capacite');
            $table->text('description')->nullable();
            $table->foreignId('bloc')
                ->constrained()
                ->references('id')
                ->on('blocs')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('typeSalle')
                ->constrained()
                ->references('id')
                ->on('typesalles')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salles');
    }
};
