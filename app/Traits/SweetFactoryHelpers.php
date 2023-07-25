<?php

namespace App\Traits;

use ErrorException;
use Illuminate\Support\Facades\Schema;

trait SweetFactoryHelpers
{

    /***
     * Create table relationship (Foreign key)
     * @param $table_name
     * @param $model
     * @return mixed
     * @throws ErrorException
     */
    public function createForeignKey($table_name, $model)
    {


        if (\Schema::hasTable($table_name)) {
            $_model = $model::query()->first();

            if ($_model !== null) {
                $fk = $_model[$model::PK];
            } else {
                $fk = $model::factory()->create()->first()[$model::PK];
            }
        } else {
            throw new ErrorException("table $table_name not exists", 0, 1, basename(__FILE__, '.php'));

        }
        return $fk;
    }

    /***
     * Get Faker instance with default lang :  arabic
     * @return \Faker\Generator
     */
    public function arabicFake()
    {
        return fake('ar_JO');
    }
}
