<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> pedidos pendientes </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset ('estilos/estilos.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="{{ route ('home') }}" class="navbar-brand">
                <img src="{{ asset ('imagenes/E.E.S.T N°4.jpg') }}" alt="logo, Técnica N°4">
            </a>
        </div>
        
        <a href="{{ route ('login') }}">
            <img src="{{ asset ('imagenes/cuenta.png') }}" alt="cuenta" id="cuenta">
        </a>
        <a href="{{ route ('carrito') }}">
            <img src="{{ asset ('imagenes/carrito_compras.png') }}" alt="carrito" id="carrito">
        </a>
    </nav>

    <div class="container mt-4">
        <h3>
            Pedidos pendientes
        </h3>

        @if ($pedidos -> count ())
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Usuario
                    </th>
                    <th>
                        Productos
                    </th>
                    <th>
                        Total
                    </th>
                    <th>
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td>
                            {{ $pedido -> usuario -> nombre_usuario }}
                        </td>
                        <td>
                            {{ $pedido -> productos -> nombre }}
                        </td>
                        <td>
                            ${{ number_format ($pedido -> total, 2) }}
                        </td>
                        <td>
                            <form action="{{ route ('pedidos.entrega_pedids', $pedido -> id) }}">
                                @csrf 
                                @method ('POST')

                                <input type="submit" class="btn btn-outline-success" value="Entregar">
                            </form>
                            <form action="{{ route ('admin.anular_pedido') }}">
                                @csrf 
                                @method ('POST')

                                <input type="submit" class="btn btn-outline-danger" value="Anular">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif 
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>