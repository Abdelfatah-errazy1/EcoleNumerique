<?php

namespace App\Models;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salles extends Model
{
    use HasFactory;
    public $table = 'salles';
    public $primaryKey = 'id';
    public $timestamps = false;
    public const PK = 'id';



}
