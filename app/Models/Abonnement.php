<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;

    public $table="abonnements";
    public $primaryKey ="id";
    public $incrementing=true;
    protected $keyType = 'int';
    public $timestamps = false;

    //added
    public const PK = 'id';

}
