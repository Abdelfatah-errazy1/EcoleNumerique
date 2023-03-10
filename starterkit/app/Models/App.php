<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;

    public const  PK = 'id';
    protected $table = 'apps';
    protected $keyType = 'string';

}
