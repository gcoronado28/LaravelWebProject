<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $fillable = ['nombre', 'proveedor'];
  
    protected $primaryKey = 'codigo';

    protected $table = 'ingrediente';
}
