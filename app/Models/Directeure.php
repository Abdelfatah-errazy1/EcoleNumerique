<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directeure extends Model
{
    use HasFactory;
    protected $table = 'directeure';
    public $primaryKey = "id";
    public $timestamps = true;
    public $incrementing = true;
    protected $keyType = 'int';
    public const  PK = 'id';
}
