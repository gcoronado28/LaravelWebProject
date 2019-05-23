<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    protected $fillable = ['nombre', 'valor'];
  
    protected $primaryKey = 'codigo';

    protected $table = 'plato';
  
    public function ingredientes()
    {
      return $this->belongsToMany('App\Ingrediente', 'plato_ingrediente', 'codplato', 'codingrediente')
        ->withTimestamps();
    }
}
