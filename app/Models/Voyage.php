<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyage extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 'start_date', 'end_date', 'destination_id', 'details', 'image', // Ajoutez 'image' ici
    ];
    

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
