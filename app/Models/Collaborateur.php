<?php

namespace App\Models;

//use App\services\Traits\models\ModelDefaultFunctions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborateur extends Model
{
    use HasFactory;
    public $table = "collaborateurs";
    public $primaryKey = "matricule";
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    public const PK = 'matricule';



    public  function account(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(OfficeAccount::class, 'collaborateur_Fk',$this->primaryKey);
    }



}
