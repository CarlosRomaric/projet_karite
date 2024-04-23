<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

class Region extends Model
{
    public $fillable = ['name'];

    public function departements()
    {
        return $this->hasMany(Departement::class);
    }

    public function agribusinesses(){
        return $this->hasMany(Agribusiness::class);
    }
}
