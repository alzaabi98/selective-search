<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    public function medicines()
    {

        return $this->hasMany(Medicince::class);
    }

    public function location()
    {

        return $this->belongsTo(Location::class);
    }
}
