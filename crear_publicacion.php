<?php
error_reporting(E_ERROR | E_PARSE);
include("db.php");
session_start();
$id_usuario = $_SESSION['id_usuario'];
$nombre = $_POST['text__publicacion'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['text__publicacion'];
$img = addslashes(file_get_contents($_FILES['file']['tmp_name']));

$sql = "INSERT INTO publicacion( titulo,descripcion, id_usuario, foto) VALUES ('$titulo','$descripcion','$id_usuario','$img')";

$resultado2 = mysqli_query($conexion, $sql);

if ($resultado2) {

    include("index.php");
?>
    <div class="ok-div">
        <h1>Publicacion creada!</h1>
    </div>
<?php
}
mysqli_close($conexion);
