<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pizzas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Lista de Pizzas</h1>
            <a href="{{ route('pizzas.create') }}" class="btn btn-primary">Crear Pizza</a>
        </div>

        <div id="pizza-container" class="row gy-4"></div>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Función global para eliminar una pizza
        const deletePizza = (id) => {
            const apiUrl = '{{ url("api/pizzas") }}';

            fetch(`${apiUrl}/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
            })
            .then(response => {
                if (!response.ok) throw new Error('Error al eliminar la pizza');
                alert('Pizza eliminada exitosamente.');
                document.getElementById(`pizza-${id}`).remove();
            })
            .catch(error => {
                console.error('Error al eliminar la pizza:', error);
                alert('Error al eliminar la pizza.');
            });
        };

        // Cargar las pizzas
        document.addEventListener('DOMContentLoaded', () => {
            const apiUrl = '{{ url("api/pizzas") }}';
            const pizzaContainer = document.getElementById('pizza-container');

            fetch(apiUrl)
                .then(response => {
                    if (!response.ok) throw new Error('Error al obtener las pizzas');
                    return response.json();
                })
                .then(pizzas => {
                    if (pizzas.length === 0) {
                        pizzaContainer.innerHTML = '<p class="text-center text-muted">No hay pizzas disponibles.</p>';
                        return;
                    }

                    pizzas.forEach(pizza => {
                        const pizzaDiv = document.createElement('div');
                        pizzaDiv.classList.add('col-md-4');
                        pizzaDiv.id = `pizza-${pizza.id}`;
                        pizzaDiv.innerHTML = `
                            <div class="card shadow-sm">
                                <img src="${pizza.imagen ? `{{ url('storage') }}/${pizza.imagen}` : 'https://via.placeholder.com/300'}" class="card-img-top" alt="${pizza.nombre}">
                                <div class="card-body">
                                    <h5 class="card-title">${pizza.nombre}</h5>
                                    <p class="card-text"><strong>Precio:</strong> ${pizza.price}€</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ url('/pizzas') }}/${pizza.id}" class="btn btn-primary btn-sm">Ver detalles</a>
                                        <button class="btn btn-danger btn-sm" onclick="deletePizza(${pizza.id})">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        `;
                        pizzaContainer.appendChild(pizzaDiv);
                    });
                })
                .catch(error => {
                    console.error(error);
                    pizzaContainer.innerHTML = '<p class="text-center text-danger">Error al cargar las pizzas.</p>';
                });
        });
    </script>
</body>
</html>
