<?php
include('db.php');
$email = $conexion->real_escape_string($_POST['email']);
$contraseña = $conexion->real_escape_string($_POST['contraseña']);
session_start();

$_SESSION['email'] = $email;

$consulta = "SELECT*FROM usuarios where email='$email' and pass='$contraseña'";
$resultado = mysqli_query($conexion, $consulta);



$filas = mysqli_num_rows($resultado);

if ($filas) {
    $sql = "SELECT * FROM usuarios WHERE email='$email'";

    $resultado = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($resultado);

    $nombre = $row['nombre'];
    $_SESSION['nombre'] = $nombre;
    $apellido = $row['apellido'];
    $_SESSION['apellido'] = $apellido;
    $id = $row['id_usuario'];
    $_SESSION['id_usuario'] = $id;
    $id_rol = $row['id_rol'];
    $_SESSION['id_rol'] = $id_rol;
    header("location:index.php");
} else {
?>

    <?php

    include("login.php");
    ?>
    <div class="bad">
        <h2 class="error_logeo">Email o contraseña ingresados son incorrectos!</h2>
    </div>

<?php
}


mysqli_free_result($resultado);
mysqli_close($conexion);
