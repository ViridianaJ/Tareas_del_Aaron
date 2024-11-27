<?php
require 'conexion.php';
session_start();

// Obtener los datos enviados desde el formulario
$n_carnet = $_POST['n_carnet']; // El campo n_carnet

// Consulta SQL que verifica si existe el usuario solo por el n_carnet
$q = "SELECT COUNT(*) as contar FROM paciente WHERE n_carnet = '$n_carnet'";

// Ejecutar la consulta
$consulta = mysqli_query($conexion, $q);

// Obtener el resultado
$array = mysqli_fetch_array($consulta);

if ($array['contar'] > 0) {
    // Si el paciente existe, guardar la sesión y redirigir
    $_SESSION['usermane'] = $n_carnet; // Guardar el número de carnet en la sesión
    header("location: ../Principal.php");
} else {
    // Si no existe, redirigir a una página de error
    header("location: ../indexError.php");
}
?>
