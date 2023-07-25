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
        Schema::create(config('tables.modules.name'), function (Blueprint $table) {
            $table->id();
            $table->string(config('tables.modules.columns.code'),20);
            $table->string(config('tables.modules.columns.name_fr'),100);
            $table->string(config('tables.modules.columns.name_ar'),100)->nullable();
            $table->string(config('tables.modules.columns.duration'),50)->nullable();
            $table->float(config('tables.modules.columns.coefficient'));
            $table->text(config('tables.modules.columns.description_fr'));
            $table->text(config('tables.modules.columns.description_ar'));

            $table->foreignId(config('tables.modules.columns.fk_options'))
                ->constrained()
                ->references(config('tables.options.columns.id'))
                ->on(config('tables.options.name'))
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
        Schema::dropIfExists(config('tables.modules.name'));
    }
};
