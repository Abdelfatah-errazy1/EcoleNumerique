<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsChapitre extends Model
{
    use HasFactory;
    public $table = 'detailschapitres';
    public $timestamps = false;
    protected $primaryKey = 'idDC';
    public const PK = 'idDC';
    public static function jointureForeignKey($key=null)
{
   return DetailsChapitre::query()
    ->join('chapitres as ch', 'ch.idCh', 'detailschapitres.chapitre')
    ->select('detailschapitres.*','detailschapitres.idDC','ch.idCh', 'ch.nomFr as chapitre')
        ->when(isset($key), function ($builder) use ($key) {
            
            $builder->where('ch.idCh', $key);
        })
        ->get();
}
}

