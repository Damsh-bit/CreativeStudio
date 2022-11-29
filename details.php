<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['email'])) {
    header("Location:login.php");
}
include('./functions.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Creative Studio</title>
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

            <ul class="saludo">
                <a href="account.php?id=<?php echo $_SESSION['id_usuario'] ?>">
                    <h1>Hola, <?php echo $_SESSION['email']; ?>! </h1>
                </a>
                <a href="logout.php"><i class="uil uil-sign-out-alt"></a></i>
            </ul>

        </nav>
    </section>

    <section class="publicaciones">
        <div class="publicaciones__container">
            <?php getPublicacionDetails($_GET['id_pub']) ; ?>
        </div>
    </section>
</body>

</html>