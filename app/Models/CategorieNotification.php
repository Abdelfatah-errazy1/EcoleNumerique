<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieNotification extends Model
{
    use HasFactory;
    protected $table = 'categoriesNotifications';
    public $primaryKey = "idCN";

    public $timestamps = false;
    public const  PK = 'idCN';
}
