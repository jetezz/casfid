<?php

namespace Database\Seeders;

use App\Models\Ingrediente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        // Crear cinco ingredientes
        Ingrediente::create([
            'nombre' => 'Queso Mozzarella',
            'precio' => 2.50,
        ]);

        Ingrediente::create([
            'nombre' => 'Tomate',
            'precio' => 1.00,
        ]);

        Ingrediente::create([
            'nombre' => 'Pepperoni',
            'precio' => 3.00,
        ]);

        Ingrediente::create([
            'nombre' => 'Champiñones',
            'precio' => 1.50,
        ]);

        Ingrediente::create([
            'nombre' => 'Albahaca',
            'precio' => 0.75,
        ]);
    }
}
