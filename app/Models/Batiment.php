<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batiment extends Model
{
    use HasFactory;

    protected $table = 'batiments';
    public $primaryKey ='id';
    public const  PK = 'id';
    public $timestamps = false;


}
