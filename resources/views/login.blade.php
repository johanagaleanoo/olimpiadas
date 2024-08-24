<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> inicio de sesion </title>
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

    <div class="d-flex justify-content-center align-item-center">
        <div class="card" id="card_register_login">
            <div class="card-body">
                <h2>
                    Inicio de Sesion
                </h2>
                <form action="{{ route ('login') }}" method="post">
                    @csrf 

                    <div class="mb-3">
                        <!-- email -->
                        <label for="email">
                            Email
                        </label>
                        <input type="email" name="email" id="input_email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <!-- contraseña -->
                        <label for="contraseña">
                            Contraseña
                        </label>
                        <input type="password" name="password" id="input_password" class="form-control">
                    </div>

                    <br>

                    <button type="submit" id="btn_enviar" class="btn btn-outline-success">
                        Enviar
                    </button>

                    <br><br>

                    <a href="{{ route ('register') }}" id="btn_link">
                        Registrarse
                    </a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>