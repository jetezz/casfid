<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Pizza</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .details {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
    <!-- Botón de regreso -->
    <a href="{{ url('/pizzas') }}" class="back-button">
        ← <span>Volver a la lista</span>
    </a>

    <h1>Detalles de la Pizza</h1>
    <div id="pizza-details" class="details">
        <p>Cargando...</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const pizzaId = {{ $id }};
            const apiUrl = `{{ url('api/pizzas') }}/${pizzaId}`;
            const pizzaDetails = document.getElementById('pizza-details');

            // Llamada a la API para obtener los detalles de la pizza
            fetch(apiUrl)
                .then(response => {
                    if (!response.ok) throw new Error('Error al obtener los detalles de la pizza');
                    return response.json();
                })
                .then(pizza => {
                    pizzaDetails.innerHTML = `
                        <h2>${pizza.nombre}</h2>
                       <p><strong>Imagen:</strong> 
                            ${pizza.imagen ? `<img src="${pizza.imagen ? `{{ url('storage') }}/${pizza.imagen}` : 'https://via.placeholder.com/300'}" class="card-img-top" alt="${pizza.nombre}">` : 'No disponible'}
                        </p>
                        <p><strong>Precio Total:</strong> ${pizza.price ? pizza.price.toFixed(2) : '0.00'}€</p>
                        <p><strong>Ingredientes:</strong></p>
                        <ul>
                            ${pizza.ingredientes ? pizza.ingredientes.map(ingrediente => `<li>${ingrediente.nombre} (${ingrediente.precio}€)</li>`).join('') : '<li>No hay ingredientes</li>'}
                        </ul>
                    `;
                })
                .catch(error => {
                    console.error(error);
                    pizzaDetails.innerHTML = '<p>Error al cargar los detalles de la pizza.</p>';
                });
        });
    </script>
</body>
</html>
