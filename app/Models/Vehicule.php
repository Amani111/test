<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable=['id','nom'];

   
    /* RELATIONSHIPS */
    public function modele()
    {
        return $this->belongsTo(Modele::class,'modele_id');
    }

    public function marque()
    {
        return $this->belongsTo(Marque::class,'marque_id');
    }
}
