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
        Schema::create('fichierJNotifications', function (Blueprint $table) {
            $table->id();
            $table->string('titre',100);
            $table->text('description')->nullable();
            $table->string('pathFJN',150)->nullable();

            $table->foreignId('notification')
                ->constrained()
                ->references('idN')
                ->on('notifications')
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
        Schema::dropIfExists('fichierJNotifications');
    }
};
