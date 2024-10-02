<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_personnes',
        'date_debut',
        'date_fin',
        'tarif_total',
        'chambre_id', 
    ];
    public function chambre()
{
    return $this->belongsTo(Chambre::class);
}

public function transport()
{
    return $this->belongsTo(Transport::class);
}
}



