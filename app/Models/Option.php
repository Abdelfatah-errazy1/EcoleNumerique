<?php

namespace App\Models;

use App\Models\Option as ModelTarget;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $table = 'options';
    public const PK = 'id';
    protected $primaryKey = 'id';

    /***
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author  MRX
     * Get current option secteur
     */
    public function secteur()
    {
        return $this->belongsTo(Secteur::class, 'secteur');
    }

    /***
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     * @author  MRX
     * Get all filliere belong to the current option
     */
    public function filliere()
    {
        return $this->hasMany(FilliereNiveau::class, 'option');
    }


    /***
     * Filter Options By secteur
     * @param $secteurId
     * @return array|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\HigherOrderWhenProxy[]
     * @author  MRX
     */
    public static function findBySecteurId($secteurId)
    {
        return self::query()
            ->join('secteurs', 'secteurs.idS', 'options.secteur')
            ->when(isset($secteurId), function ($builder) use ($secteurId) {
                $builder->where('secteurs.idS', $secteurId);
            })
            ->select('options.*', \DB::raw('CONCAT(secteurs.nomAR , " ",secteurs.nomFR ) as secteur_name'))
            ->get();
    }


    /***
     * Filter Options By secteur
     * @param $secteurId
     * @return array|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\HigherOrderWhenProxy[]
     * @author  MRX
     */
    public static function filterdByCentreId($centreId)
    {
        return self::query()
//            ->join('etaboption', 'etaboption.option', 'options.'.self::PK)
//            ->where('etaboption.centreFormation',$centreId)
            ->select('options.*' , \DB::raw(' if(options.id_option in(select  option from etaboption) , true, false) as is_affected'))
            ->get();
    }



}
