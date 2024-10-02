<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'mode',
        'cout',
        'horaire_depart',
        'horaire_arrivee',
        'eco_friendly',
        'image', 
    ];
    public function reservations()
{
    return $this->hasMany(Reservation::class);
}
}


