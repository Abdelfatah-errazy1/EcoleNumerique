<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeSalle extends Model
{
    use HasFactory;

    protected $table = 'typeSalles';
    public $primaryKey ='id';
    public const  PK = 'id';
    public $timestamps = false;


}
