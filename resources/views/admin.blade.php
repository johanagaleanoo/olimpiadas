<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> home </title>
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
        <a href="{{ route ('carrito.show') }}">
                <img src="{{ asset ('imagenes/carrito_compras.png') }}" alt="carrito" id="carrito">
        </a>
    </nav>

    <div class="row">
        <div class="container">
            <h2>
                Admin
            </h2>

            @if (auth () -> user () -> tipo_cuenta === 'admin')
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>
                            Id
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Accion
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                    <tr class="table-secondary">
                        <td>
                            <a href="{{ route('admin.show', ['id' => $pedido -> id]) }}" class="btn btn-outline-info">
                                Ver
                            </a>
                            <a href="{{ route('admin.entrega_pedidos', ['id' => $pedidos -> id]) }}" class="btn btn-outline-success">
                                Entrega de Pedidos
                            </a>
                            <a href="{{ route('admin.anular_pedido', ['id' => $pedido -> id]) }}" class="btn btn-outline-danger">
                                Anula Pedido
                            </a>
                        </td>
                    </tr>>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
