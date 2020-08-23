<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   protected $fillable=['id','nom'];

    /* RELATIONSHIPS */
    public function vehicules()
    {
       return $this->hasMany(Vehicule::class, 'marque_id');
    }
}
