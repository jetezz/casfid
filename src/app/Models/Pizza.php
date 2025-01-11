<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Ingrediente;
use App\Services\PizzaService;
use Illuminate\Support\Facades\App;

class Pizza extends Model
{
    use HasFactory;

   

 
    protected $fillable = ['nombre', 'imagen'];
    protected $with = ['ingredientes'];
    protected $appends = ['price'];

    /**
     * Relación muchos a muchos con ingredientes.
     */
    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'pizza_ingrediente')->withTimestamps();
    }

    /**
     * Accesor para calcular el precio de la pizza.
     */
    public function getPriceAttribute(): float
    {
        // Obtiene automáticamente el servicio desde el contenedor
        $pizzaService = App::make(PizzaService::class);
        return $pizzaService->calculatePizzaPrice($this->id);
    }
}
