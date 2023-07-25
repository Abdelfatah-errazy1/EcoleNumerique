<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $table = 'modules';
    public $primaryKey = "idM";

    public $timestamps = false;
    
    public $heure = 0;
    public $minute = 0;
    public const  PK = 'idM';

    public function  matieres()
{
    return  Module::query()
    ->join('matieres as  m', 'm.module', 'modules.idM')
    ->join('periodes', 'periodes.idP','m.periode' )
    ->where('modules.idM', '=', $this->idM)
    ->select('m.*', 'modules.idM','periodes.nomP as periode', 'modules.nomFr as module')
    ->get();
}

public static function jointureForeignKey($key=null)
{
   return Module::query()
   ->join('filliereNiveau', 'filliereNiveau.id', 'modules.filliereniveau')
   ->select('modules.*', 'filliereNiveau.name_FR as filliereNiveau')
       ->when(isset($key), function ($builder) use ($key) {
           $builder
               ->where('filliereNiveau.id', $key);
       })
       ->get();
}
}


