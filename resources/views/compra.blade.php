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

    <div class="container">
        <div class="row">
            <div class="col-xxl-5">
                <div class="card">
                    <div class="card-body">
                        <h2>
                            Formulario de Compra
                        </h2>
                        <form action="{{ route ('compra.proceso') }}" method="post">
                            @csrf 

                            <h3>
                                Pago
                            </h3>
                            <div class="alert alert-secondary" role="alert">
                                <strong>
                                    Total de la Compra

                                    <br>

                                    {{ number_format ($total_compra, 2) }}
                                </strong>
                            </div>
                            <div class="mb-3">
                                <label for="numero_tarjeta" class="form-label">
                                    Número de Tarjeta
                                </label>
                                <input type="text" name="numero_tarjeta" id="numero_tarjeta" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="nombre_tarjeta" class="form-label">
                                    Nombre Registrado en la Tarjeta
                                </label>
                                <input type="text" name="nombre_tarjeta" id="nombre_tarjeta" class="form-control">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="expiracion_tarjeta" class="form-label">
                                        Fecha de Expiración
                                    </label>
                                    <input type="datetime" name="expiracion_tarjeta" id="expiracion_tarjeta" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="codigo_tarjeta" class="form-label">
                                        Código de Seguridad
                                    </label>
                                    <input type="text" name="codigo_tarjeta" id="codigo_tarjeta" class="form-control">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-outline-success" value="Comprar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>