<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secteur extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public const  PK = 'id';


    public function options()
    {
        return $this->hasMany(Option::class, 'secteur');
    }


    public static function allForSelect()
    {
        return self::query()
            ->select('secteurs.idS', \DB::raw('CONCAT(secteurs.nomAR , " ",secteurs.nomFR ) as secteur_name'))
            ->get();
    }


}
