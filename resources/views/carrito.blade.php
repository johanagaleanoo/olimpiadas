<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> carrito de compras </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset ('estilos/estilos.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="{{ route ('home') }}" class="navbar-brand">
                <img src="{{ asset ('imagenes/E.E.S.T N°4.jpg') }}" alt="logo, Técnica N°4">
            </a>
            <a href="{{ route ('login') }}">
                <img src="{{ asset ('imagenes/cuenta.png') }}" alt="cuenta" id="cuenta">
            </a>
        </div>
    </nav>

    <div class="container d-flex justify-content-center">
        <div class="card w-100">
            <div class="card-body">
                @if (session ('success'))
                <div class="alert alert-success">
                    {{ session ('success') }}
                </div>
                @endif

                @if (count (session ('carrito', [])) > 0)
                <table class="table table-dark">
                    <thead>
                        <h2>
                            Productos
                        </h2>
                        <tr>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Precio
                            </th>
                            <th>
                                Cantidad
                            </th>
                            <th>
                                Total
                            </th>
                            <th>
                                Accion
                            </th>
                        </tr>
                        <tbody>
                            @foreach (session ('carrito', []) as $id => $producto)
                            <tr>
                                <td>
                                    {{ $producto ['nombre'] }}
                                </td>
                                <td>
                                    {{ number_format ($producto ['precio'], 2) }}
                                </td>
                                <td>
                                    {{ $producto ['cantidad'] }}
                                </td>
                                <td>
                                    {{ number_format ($producto ['precio'] * $producto ['cantidad'], 2) }}
                                </td>
                                <td>
                                    <form action="{{ route ('carrito.eliminar', $id) }}" method="post">
                                        @csrf 
                                        @method ('DELETE')

                                        <input type="submit" class="btn btn-outline-danger btn_eliminar" value="Eliminar">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tfoot>
                                <tr>
                                    <td class="text-right" colspan="3">
                                        <strong>
                                            total
                                        </strong>
                                    </td>
                                    <td>
                                        {{ number_format ($total_compra, 2) }}
                                    </td>
                                </tr>
                            </tfoot>
                        </tbody>
                    </thead>
                </table>

                <form action="{{ route ('compra.form') }}" method="get">
                    @csrf 

                    <input type="submit" class="btn btn-outline-success" value="Comprar">
                </form>
                @else 
                <p>
                    No hay productos
                </p>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>