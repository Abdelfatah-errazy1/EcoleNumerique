<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtablissementOption extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public const PK = 'id';
    public $table = "etablissement_options";
}
