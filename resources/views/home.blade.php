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

    <div class="container-md">
        <div class="row justify-content-xl-center">
            <h2>
                Productos
            </h2>

            @foreach ($productos as $producto)
            <div class="col-sm-5 mb-1">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $producto ['nombre'] }}
                        </h5>
                        <p class="card-text">
                            {{ $producto ['descripcion'] }}
                        </p>
                        <p class="fs-6">
                            {{ number_format ($producto ['precio'], 2) }}
                        </p>

                        <form action="{{ route ('carrito.agregar') }}" method="post">
                            @csrf 

                            <input type="hidden" name="id" value="{{ $producto -> id }}">
                            <input type="hidden" name="nombre" value="{{ $producto -> nombre }}">
                            <input type="hidden" name="precio" value="{{ $producto -> precio }}">
                            <input type="number" name="cantidad" value="0" min="1" class="form-control mb-2" id="input_cantidad">

                            <input type="submit" value="Agregar" class="btn btn-outline-success">
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>