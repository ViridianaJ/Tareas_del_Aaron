<?php
require "conexion.php";
mysqli_set_charset($conexion, 'utf8');

// Verificar que el campo n_carnet fue enviado correctamente
if (isset($_POST['n_carnet']) && !empty($_POST['n_carnet'])) {
    $registroEliminado = $_POST['n_carnet'];

    // Escapar el valor para prevenir inyección SQL
    $registroEliminado = mysqli_real_escape_string($conexion, $registroEliminado);

    // Consulta SQL completa
    $consulta = "DELETE FROM paciente WHERE n_carnet = '$registroEliminado'";

    // Ejecutar la consulta
    if (mysqli_query($conexion, $consulta)) {
        // Redirigir después de la eliminación exitosa
        header('Location: ../EliminarPaciente.php?mensaje=eliminado');
    } else {
        // Manejar errores en la consulta
        echo "Error al eliminar el registro: " . mysqli_error($conexion);
    }
} else {
    echo "No se recibió el número de carnet para eliminar.";
}

// Cerrar la conexión
mysqli_close($conexion);
?>
