<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizzas = Pizza::all();
        return response()->json($pizzas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $ingredientes = \App\Models\Ingrediente::all();

        return view('pizzas.create', compact('ingredientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'ingredientes' => 'required|array',
            'ingredientes.*' => 'exists:ingredientes,id',
        ]);

         // Subir la imagen
        $imagePath = null;
        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('images', 'public'); 
        }

        // Crear la pizza
        $pizza = Pizza::create([
            'nombre' => $validated['nombre'],
            'imagen' => $imagePath, 
        ]);

        // Asociar los ingredientes
        $pizza->ingredientes()->attach($validated['ingredientes']);

        // Redirigir a la lista de pizzas
        return redirect()->route('index')->with('success', 'Pizza creada exitosamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pizza = Pizza::with('ingredientes')->findOrFail($id); 
        return response()->json($pizza);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return response()->json(['message' => 'Pizza eliminada exitosamente'], 200);
    }
}
