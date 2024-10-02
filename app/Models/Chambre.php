<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'nom',
        'type',
        'vue',
        'tarif_total',
        'etage',
        'tarif_double',
        'tarif_simple',
        'nombre_nuitees',
        'eco_friendly',
        'services_choisis',
        'image',
        'reserver',
       
    ];
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    
}


