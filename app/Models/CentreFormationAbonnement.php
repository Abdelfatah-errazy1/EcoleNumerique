<?php

namespace App\Models;


//use App\Models\CentreFormation;
//use App\Models\Etablissement;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CentreFormationAbonnement extends Model
{


    public static bool $useMutator = false;

    protected $table = 'centreformationsabonnement';
    public $primaryKey = "id";
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps=false;
    public const  PK = 'id';





    public static function centerAbonnement($center): \Illuminate\Database\Eloquent\Collection|\LaravelIdea\Helper\App\Models\_IH_CentreFormationAbonnement_C|array
    {
        return self::query()
            ->join(config('tables.abonnements.name'), config('tables.abonnements.name').'.'. Abonnement::PK , config('tables.centreformationsabonnement.name').'.'.config('tables.centreformationsabonnement.columns.abonnement_Fk'))
            ->join(config('tables.centreformations.name'), config('tables.centreformations.name').'.'. CentreFormation::PK, '=', config('tables.centreformationsabonnement.name').'.'.config('tables.centreformationsabonnement.columns.center_FK') )
            ->join(config('tables.etablissements.name'), config('tables.etablissements.name').'.'. Etablissement::PK, '=', config('tables.centreformations.name').'.'.config('tables.centreformations.columns.etablissement_FK'))
            ->where(config('tables.centreformations.name').'.'. CentreFormation::PK , $center)
            ->select(config('tables.centreformationsabonnement.name').'.*', config('tables.abonnements.name').'.'.config('tables.abonnements.columns.title'), config('tables.abonnements.name').'.'.config('tables.abonnements.columns.tarif_vente'),
                \DB::raw('CONCAT('.config('tables.etablissements.name').'.'.config('tables.etablissements.columns.name_FR').') as etablissementInfo')
            )
            ->get();
    }
//
//
//    public function getdateDébutAttribute($value)
//    {
//
//        if (self::$useMutator) {
//            return Carbon::parse($value)->toFormattedDateString();
//        }
//        return $value;
//    }
//
//
//    public function getdateFinAttribute($value)
//    {
//
//        if (self::$useMutator) {
//            return Carbon::parse($value)->toFormattedDateString();
//        }
//        return $value;
//    }

}
