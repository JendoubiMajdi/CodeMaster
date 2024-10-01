<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;
    protected $fillable = ['destination', 'description', 'article_id','image_url', 'image_public_id'];

    // Un guide appartient à un article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
