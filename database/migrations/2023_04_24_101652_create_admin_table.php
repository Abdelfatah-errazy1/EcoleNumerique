<?php

use App\Enums\AdminStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('tables.admins.name'), function (Blueprint $table) {
            $table->id();
            $table->string(config('tables.admins.columns.first_name'), 150)->nullable();
            $table->string(config('tables.admins.columns.last_name'), 150)->nullable();
            $table->string(config('tables.admins.columns.photo'))->nullable();
            $table->dateTime(config('tables.admins.columns.birthday'))->nullable();
            $table->string(config('tables.admins.columns.gender'))->default('M')->nullable();
            $table->string(config('tables.admins.columns.phone_number'), 15)->nullable();
            $table->string(config('tables.admins.columns.email'))->nullable();
            $table->string(config('tables.admins.columns.description'))->nullable();
            $table->string(config('tables.admins.columns.job'), 150)->nullable();
            $table->string(config('tables.admins.columns.role'), 3)->default('A')->nullable();
            $table->string(config('tables.admins.columns.status'))->default(AdminStatus::ACTIVE->value)->nullable();
            $table->string(config('tables.admins.columns.created_by'))->nullable();
            $table->foreignId(config('tables.admins.columns.updated_by'))
                ->nullable()
                ->references(config('tables.admins.columns.id'))
                ->on(config('tables.admins.name'))
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string(config('tables.admins.columns.password'))->nullable();
            $table->string(config('tables.admins.columns.token'))->nullable();
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
        Schema::dropIfExists('admins');
    }
};
