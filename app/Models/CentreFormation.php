<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentreFormation extends Model
{
    use HasFactory;


    protected $table = 'centreformations';
    public $primaryKey = "id";
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    public const  PK = 'id';



//   public static function findByEtabId($etabId)
//    {
//        return self::query()
//            ->join('etablissements', 'etablissements.'.Etablissement::PK, 'centresformations.etablissemment')
//            ->when(isset($etabId), function ($builder) use ($etabId) {
//                $builder->where('etablissements.'.Etablissement::PK, $etabId);
//            })
//            ->select('centresformations.*', 'etablissements.NomEtabFr')
//            ->get();
//    }
}
