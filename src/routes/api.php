<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;



Route::resource('pizzas', PizzaController::class);



