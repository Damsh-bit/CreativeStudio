<?php
include("db.php");

$id_publicacion = $_GET['id_publicacion'];

$sql = "DELETE FROM favoritos WHERE id_publicacion='$id_publicacion'";

$resultado = mysqli_query($conexion, $sql);

header('Location:favorites.php');