<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichierJNotification extends Model
{
    use HasFactory;
    protected $table = 'fichierJNotifications';
    public $primaryKey = "id";

    public $timestamps = false;
    public const  PK = 'id';

    
}
