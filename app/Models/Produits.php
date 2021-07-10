<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','quantity','pharmacie_id'];

    public function pharmacie()
    { 
        return $this->belongsTo(Pharmacie::class); 
    }
}
