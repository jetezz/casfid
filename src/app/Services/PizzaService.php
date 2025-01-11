<?php

namespace App\Services;

use App\Models\Pizza;

class PizzaService
{
    /**
     * Calcula el precio de una pizza sumando el precio de sus ingredientes.
     */
    public function calculatePizzaPrice(int $pizzaId): float
    {
        $pizza = Pizza::with('ingredientes')->findOrFail($pizzaId);       
        $price = $pizza->ingredientes->sum('precio') * 1.5;

        return $price;
    }
}
