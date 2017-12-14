<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fitness extends Model {
    protected $table = 'fitness';
    protected $fillable = ['categoria', 'ejecucion', 'imagen', 'nombre', 'posicion'];
}