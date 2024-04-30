<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Offer extends Model
{
    use HasFactory;

    public function farmer(){
        return $this->belongsTo(Farmer::class);
    }
}
