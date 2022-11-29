<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <title>Registrarse</title>
</head>

<body>
    <section class="login">
        <div class="login__container">
            <div class="login__box">
                <div class="brand">
                    <img src="./assets/brand.png" alt="brand">
                </div>
                <form action="registrar_usuario.php" method="POST">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingresar email" required>
                    <label for="nombre" class="form-label">Nombre</label>

                    <input type="nombre" class="form-control" name="nombre" placeholder="Ingresar nombre" required>
                    <label for="apellido" class="form-label">Apellido</label>

                    <input type="apellido" class="form-control" name="apellido" placeholder="Ingresar apellido" required>
                    <label for="contraseña" class="form-label">Contraseña</label>

                    <input type="password" class="form-control" name="contraseña" maxlength="20" placeholder="Ingresar contraseña" required>
                    <button type="submit" class="btn btn-primary">Registrarse</button>

                    <h4 class="register">Ya tienes cuenta? <a href="login.php">Iniciar sesion</a></h4>
                </form>
            </div>
        </div>
    </section>
</body>

</html>