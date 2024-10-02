<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'name',
        'description',
        'localisation',
        'certification',
        'contact_number',
        'website',
        'rating',
        'number_of_rooms',
        'adresse',
        'pays',
        'services',
        'activites',
        'nombre_etages'
    ];

    // A hotel has many chambres
    public function chambres()
    {
        return $this->hasMany(Chambre::class);
    }
}
