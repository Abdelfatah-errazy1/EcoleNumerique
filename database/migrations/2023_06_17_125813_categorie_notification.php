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
        Schema::create('categoriesNotifications', function (Blueprint $table) {
            $table->id('idCN');
            $table->string('titre',100); 
            $table->text('description')->nullable();
            $table->foreignId('centreFormation')
                ->constrained()
                ->references('id')
                ->on('centreformations')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
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
        Schema::dropIfExists('categoriesNotifications');
    }
};
