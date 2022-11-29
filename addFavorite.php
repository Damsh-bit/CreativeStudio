<?php
error_reporting(E_ERROR | E_PARSE);
include("db.php");

$id_publicacion = $_GET['id'];
$id_usuario = $_GET['id_u'];

function buscaRepetido($id_publicacion, $id_usuario)
{
    include("db.php");
    $consulta1 = "SELECT * from favoritos where id_usuario ='$id_usuario' and id_publicacion = '$id_publicacion' ";
    $resultado1 = mysqli_query($conexion, $consulta1);
    if (mysqli_num_rows($resultado1) > 0) {
        return 'hay_repetido';
    } else {
        return 'no_hay_repetido';
    }
}

if (buscaRepetido($id_publicacion, $id_usuario) == 'hay_repetido') {
    include("index.php");
?>
    <div class="bad">
        <h1>La publicacion ya esta en favoritos!</h1>
    </div>
<?php
} else {
    $consulta = "INSERT INTO favoritos( id_usuario,id_publicacion) VALUES ('$id_usuario','$id_publicacion')";
    $resultado2 = mysqli_query($conexion, $consulta);

    include("index.php");
?>
    <div class="ok-div">
        <h1>Publicacion agregada a favoritos!</h1>
    </div>
<?php
}




mysqli_close($conexion);
