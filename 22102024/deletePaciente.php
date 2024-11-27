<?php
require "conexion.php";
mysqli_set_charset($conexion,'utf8');
$registroEliminado =$_POST['n_carnet'];
$consulta="DELETE FROM paciente WHERE n_carnet = ";

mysqli_query($conexion, $consulta . $registroEliminado);
mysqli_close($conexion);
header('Location: EliminarPaciente.php');
?>