<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapitre extends Model
{
    use HasFactory;
    public $table = 'chapitres';
    public $timestamps = false;
    protected $primaryKey = 'idCh';
    public const PK = 'idCh';
    public function detailChapitres()
{
    return  Chapitre::query()
    ->join('detailschapitres as  dch', 'dch.chapitre', 'chapitres.idCh')
    ->where('chapitres.idCh', '=', $this->idCh)
    ->select('dch.*', 'chapitres.idCh', 'chapitres.nomFr as chapitre')
    ->get();
}
public static function jointureForeignKey($key=null)
{
   return Chapitre::query()
   ->join('matieres', 'matieres.idMat', 'chapitres.matiere')
   ->select('chapitres.*','chapitres.idCh', 'matieres.nomFr as matiere')
       ->when(isset($key), function ($builder) use ($key) {
           $builder->where('matieres.idMat', $key);
       })
       ->get();
}
}
