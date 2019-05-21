<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $fillable = ['nombre', 'valor'];
  
    protected $primaryKey = 'codigo';

    protected $table = 'plato';
}
