<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modele extends Model
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
       return $this->hasMany(Vehicule::class,'modele_id');
    }
}
