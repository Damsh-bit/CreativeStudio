<?php

error_reporting(E_ERROR | E_PARSE);
include("db.php");
session_start();
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$id_usuario = $_SESSION['id_usuario'];
$consulta = "UPDATE `usuarios` SET `nombre`='$nombre',`apellido`='$apellido',`email`='$email' WHERE id_usuario = $id_usuario";

$resultado = mysqli_query($conexion, $consulta);

session_destroy();
header('Location:login.php');

mysqli_close($conexion);
