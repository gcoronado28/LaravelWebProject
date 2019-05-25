<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $fillable = ['fecha', 'nummesa', 'estado'];
  
    protected $primaryKey = 'numero';

    protected $table = 'orden';
  
    public function platos()
    {
      return $this->belongsToMany('App\Plato', 'orden_plato', 'numorden', 'codplato')
        ->withPivot('id', 'cantidad','valor')
        ->withTimestamps();
    }
}
