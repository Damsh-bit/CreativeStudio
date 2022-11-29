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
                <span>nombre</span>
                <h1><?php echo $_SESSION['nombre'] . " " . $_SESSION['apellido'] ?></h1>
                <span>email</span>
                <h1><?php echo $_SESSION['email'] ?></h1>
                <span>rol</span>
                <h1><?php if ($_SESSION['id_rol'] == 1) {
                        echo 'Lector';
                    } else {
                        echo 'Admin';
                    } ?></h1>
            </div>
            <div class="buttons">

                <a href="edit.php?n=<?php echo $_SESSION['nombre'] ?>&a=<?php echo $_SESSION['apellido'] ?>&e=<?php echo $_SESSION['email'] ?>"><i class="uil uil-edit-alt"></i></a>
                <a href="logout.php"><i class="uil uil-signout"></i></a>
            </div>
        </div>

    </section>
</body>

</html>