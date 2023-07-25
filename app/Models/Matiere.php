<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;
    protected $table = 'matieres';
    public $primaryKey = "idMat";

    public $timestamps = false;
    public const  PK = 'idMat';
    public function chapitres()
{
   
        return  Matiere::query()
        ->join('chapitres as  ch', 'ch.matiere', 'matieres.idMat')
        ->where('matieres.idMat', '=', $this->idMat)
        ->select('ch.*', 'matieres.idMat', 'matieres.nomFr as matiere')
        ->get();
    }
    public static function jointureForeignKey($key=null)
    {
       return Matiere::query()
       ->join('modules', 'modules.idM', 'matieres.module')
       ->join('periodes', 'periodes.idP', 'matieres.periode')
       ->select('matieres.*', 'modules.nomFr as module','periodes.nomP as periode')
           ->when(isset($key), function ($builder) use ($key) {
               $builder->where('modules.idM', $key);
           })
           ->get();
    }
}
