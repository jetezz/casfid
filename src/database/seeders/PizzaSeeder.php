<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pizza;

use Faker\Factory as Faker;
class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        // Crear dos pizzas
        Pizza::create([
            'nombre' => 'Margherita',
           'imagen' => 'images/' . $faker->image('public/images', 640, 480, null, false),
        ]);

        Pizza::create([
            'nombre' => 'Pepperoni',
           'imagen' => 'images/' . $faker->image('public/images', 640, 480, null, false),
        ]);
    }
}
