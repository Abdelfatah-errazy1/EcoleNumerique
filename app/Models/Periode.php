<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;

    protected $primaryKey = "idP";

    protected $guarded = [];

    public const PK = "idP";
    public $timestamps = false;
}
