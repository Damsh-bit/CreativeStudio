<?php
error_reporting(E_ERROR | E_PARSE);
include("db.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$contraseña = $_POST['contraseña'];
$email = $_POST['email'];

function buscaRepetido($email)
{
    include("db.php");
    $consulta1 = "SELECT * from usuarios where email='$email'";
    $resultado1 = mysqli_query($conexion, $consulta1);
    if (mysqli_num_rows($resultado1) > 0) {
        return 'hay_repetido';
    } else {
        return 'no_hay_repetido';
    }
}

if (buscaRepetido($email) == 'hay_repetido') {
    include("register.php");
?>
    <div class="bad">
        <h2>Email ya existe!</h2>
    </div>
<?php
} else {
    $consulta = "INSERT INTO usuarios( nombre,apellido, pass, email, id_rol) VALUES ('$nombre','$apellido','$contraseña','$email', 1)";

    $resultado = mysqli_query($conexion, $consulta);

    include("register.php");
?>
    <div class="ok-div">
        <h1>Usuario creado correctamente!</h1>
    </div>
<?php
}




mysqli_close($conexion);
