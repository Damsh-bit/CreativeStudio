<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <title>Iniciar Sesion</title>
</head>

<body>
    <section class="login">
        <div class="login__container">
            <div class="login__box">
                <div class="brand">
                    <img src="./assets/brand.png" alt="brand">
                </div>
                <form action="validar_inicio_sesion.php" method="POST">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingresar email" required>
                    <label for="contraseña" class="form-label">Contraseña</label>
                    
                    <input type="password" class="form-control" name="contraseña" maxlength="20" placeholder="Ingresar contraseña" required>
                    <button type="submit" class="btn btn-primary">Entrar</button>

                    <h4 class="register">No tienes una cuenta? <a href="register.php">Registrate</a></h4>
                </form>
            </div>
        </div>
    </section>
</body>

</html>