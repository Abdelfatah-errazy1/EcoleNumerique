<?php

namespace App\Models;

use App\Traits\UseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use HasFactory;

    protected $table = 'filliereniveau';
    protected $primaryKey = 'id';
    public const PK = 'id';


    public static function findByOptionId($optionsId)
    {
        return self::query()
            ->join('options', 'options.'.Option::PK, 'filliereniveau.option')
            ->when(isset($optionsId), function ($builder) use ($optionsId) {
                $builder->where('options.'.Option::PK, $optionsId);
            })
            ->select('filliereniveau.*', \DB::raw('CONCAT(options.codeOp , " ",options.nomFR ) as option_name'))
            ->get();
    }



    public  function periodes(){
        return $this->hasMany(Periode::class , 'filiereNiveau');
    }

    public  function modules(){
        return $this->hasMany(Module::class , 'filier');
    }


}
