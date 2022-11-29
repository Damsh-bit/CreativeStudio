<?php
error_reporting(E_ERROR | E_PARSE);
include("db.php");
session_start();
$comment = $_POST['comment'];
$id_usuario = $_SESSION['id_usuario'];
$id_publicacion = $_POST['id_p'];


$consulta = "INSERT INTO comentarios( id_publicacion,id_usuario, comentario) VALUES ('$id_publicacion','$id_usuario','$comment')";

$resultado = mysqli_query($conexion, $consulta);

$url = 'details.php?id_pub=' . $id_publicacion;
header('Location:' . $url);

mysqli_close($conexion);
