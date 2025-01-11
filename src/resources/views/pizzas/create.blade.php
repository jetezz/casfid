<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Pizza</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-width: 400px;
        }
        label {
            font-weight: bold;
        }
        input, select, button,  {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
       .back-button {
            display: inline-flex;
            align-items: center;
            margin-bottom: 20px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
            font-size: 16px;
        }
        .back-button:hover {
            color: #007BFF;
        }
        .back-button span {
            margin-left: 8px;
        }
    </style>
</head>
<body>
    <a href="{{ url('/pizzas') }}" class="back-button">
        ← <span>Volver a la lista</span>
    </a>
    <h1>Crear Nueva Pizza</h1>

  
    <form action="{{ route('pizzas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="nombre">Nombre de la Pizza:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="imagen">Imagen de la Pizza:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*" required>

        <label for="ingredientes">Selecciona los Ingredientes:</label>
        <select id="ingredientes" name="ingredientes[]" multiple>
            @foreach ($ingredientes as $ingrediente)
                <option value="{{ $ingrediente->id }}">{{ $ingrediente->nombre }}</option>
            @endforeach
        </select>

        <button type="submit">Guardar Pizza</button>
    </form>

</body>
</html>
