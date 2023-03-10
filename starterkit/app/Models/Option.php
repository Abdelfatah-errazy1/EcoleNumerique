<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    public $table = "options";
    public $primaryKey = "id_option";
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}
