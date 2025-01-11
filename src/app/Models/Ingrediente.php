<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingrediente extends Model
{
    use HasFactory;   
  
    protected $fillable = ['nombre', 'precio']; 

    /**
     * Relación muchos a muchos con pizzas.
     */
    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'pizza_ingrediente')->withTimestamps();
    }
}
