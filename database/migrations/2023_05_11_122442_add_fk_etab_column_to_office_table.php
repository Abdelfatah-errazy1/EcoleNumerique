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
        Schema::table(config('tables.office.name'), function (Blueprint $table) {
            //
            $table->foreignId(config('tables.office.columns.etablissement_FK'))->nullable()
                ->references(config('tables.etablissements.columns.id'))
                ->on(config('tables.etablissements.name'))
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(config('tables.office.name'), function (Blueprint $table) {
            $table->dropColumn(config('tables.office.columns.etablissement_FK'));
        });
    }
};
