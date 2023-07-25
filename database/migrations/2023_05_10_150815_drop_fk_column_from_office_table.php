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
            $table->dropForeign('office_collaborateur_fk_foreign');
            $table->dropColumn(config('tables.office.columns.collaborateur_FK'));
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
            //
            $table->unsignedBigInteger(config('tables.office.columns.collaborateur_FK'));
        });
    }
};
