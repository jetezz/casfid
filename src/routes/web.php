<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', function () {
    return view('index');
});
Route::get('/dashboard', function () {
    return 'Welcome to the dashboard!';
})->middleware('auth');

Route::get('/pizzas', function () {
    return view('index');
})->name('index');

Route::get('/pizzas/{id}', function ($id) {
    return view('pizzas.show', ['id' => $id]);
})->name('pizzas.show');


