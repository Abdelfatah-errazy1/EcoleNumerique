<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapitreDetail extends Model
{
    use HasFactory;

    protected $table = 'chapitre_details';
    public const PK = 'id';
    protected $primaryKey = 'id';
}
