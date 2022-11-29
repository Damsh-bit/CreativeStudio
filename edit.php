<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['email'])) {
    header("Location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <link rel="stylesheet" href="./css/account.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Mi cuenta</title>
</head>

<body>
    <section class="navbar__section">
        <nav class="navbar">

            <ul>
                <a href="index.php"> <img height="50px" width="100px" src="./assets/brand.png" alt="brand"></a>
                <li>
                    <a href="index.php">Publicaciones</a>
                </li>
                <li>
                    <a href="favorites.php">Favoritos</a>
                </li>
            </ul>

        </nav>
    </section>

    <section class="perfil__info">
        <div class="perfil__container">
            <div class="perfil__card">
                <form action="save.php" method="POST">
                    <span>nombre</span>
                    <input type="text" name="nombre" placeholder="<?php echo $_GET['n'] ?>" required>
                    <span>apellido</span>
                    <input type="text" name="apellido" placeholder="<?php echo $_GET['a'] ?>" required>
                    <span>email</span>
                    <input type="email" name="email" placeholder="<?php echo $_GET['e'] ?>" required>
                    <span>al aceptar los cambios tendras que volver a iniciar sesion.</span>

                    <input type="submit" value="confirm">
                </form>
            </div>

        </div>

    </section>
</body>

</html>