<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacie extends Model
{
    use HasFactory;

    protected $fillable = ['name','responsable','contacts'];

    public function produits() 
    { 
        return $this->hasMany(Produits::class); 
    }

    public function assurances()
    {
        return $this->belongsToMany(Assurance::class);
    }
}
