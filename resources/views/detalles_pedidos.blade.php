<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> detales del pedido </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset ('estilos/estilos.css') }}">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3>
                    Detalles del pedido N°{{ $pedido -> id }}
                </h3>
                <p>
                    Estado: {{ $pedido -> estado }}
                </p>

                <h3>
                    Productos
                </h3>
                <ul>
                    @foreach ($pedido -> productos as $producto)
                    <li>
                        Nombre: {{ $producto -> nombre }}
                        <br>
                        Cantidad: {{ $producto -> cantidad }}
                    </li>
                    @endforeach
                </ul>

                <form action="{{ route('pedidos.update', $pedido->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="estado" class="form-label">
                            Estado
                        </label>
                        <select id="estado" name="estado" class="form-select">
                            <option value="pendiente" {{ $pedido -> estado == 'pendiente' ? 'selected' : '' }}>
                                Pendiente
                            </option>
                            <option value="enviado" {{ $pedido -> estado == 'enviado' ? 'selected' : '' }}>
                                Enviado
                            </option>
                            <option value="entregado" {{ $pedido -> estado == 'entregado' ? 'selected' : '' }}>
                                Entregado
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">
                        Actualizar
                    </button>
                </form>

                <form action="{{ route('pedidos.destroy', $pedido -> id) }}" method="post" class="mt-3">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">
                        Eliminar 
                    </button>
                </form>   
        </div>
    </div>    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>