<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ['nom',
        'adresse',
         'pays',
        'services', 
        'activites',
        'nombre_etages',
 ] ;

    public function chambres()
    {
        return $this->hasMany(Chambre::class);
    }
}

