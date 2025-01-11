<?php

namespace Database\Seeders;

use App\Models\Ingrediente;
use App\Models\Pizza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PizzaIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pizza1 = Pizza::find(1);
        $pizza2 = Pizza::find(2);

        $ingrediente1 = Ingrediente::find(1);
        $ingrediente2 = Ingrediente::find(2);
        $ingrediente3 = Ingrediente::find(3);

       
       if (!$pizza1 || !$pizza2 || !$ingrediente1 || !$ingrediente2) {
            $this->command->error('Asegúrate de que las pizzas e ingredientes existen en la base de datos.');
            return;
        }

        // Asignar ingredientes a la pizza 1
       $pizza1->ingredientes()->attach([1, 2]);

        // Asignar ingredientes a la pizza 2
        $pizza2->ingredientes()->attach([1, 2, 3]);


        $this->command->info('Ingredientes asignados a las pizzas exitosamente.');
    }
}
