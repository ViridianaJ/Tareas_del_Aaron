<?php
session_start();
$n_carnet = $_SESSION['usermane']; 


if (!isset($n_carnet)) {
    header("location: ./index.php"); 
} else {
    echo "<h1>Bienvenido a OdontoFes. Tu número de carnet es: $n_carnet</h1>";
    echo "<a href='logica/salir.php'>SALIR</a>";


    require "./logica/conexion.php";
    mysqli_set_charset($conexion, 'utf8');

    $consulta_sql = "SELECT * FROM paciente";


    $resultado = $conexion->query($consulta_sql);

 
    $count = mysqli_num_rows($resultado);

    echo "<table border='2'>
            <tr>
                <th>Paciente</th>
                <th>No Carnet</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Fecha de cita</th>
                <th>Correo</th>
                <th>Telefono</th>
            </tr>";

    if ($count > 0) {
        
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $row['paciente'] . "</td>";
            echo "<td>" . $row['n_carnet'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['edad'] . "</td>";
            echo "<td>" . $row['fecha_cita'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['telefono'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h1 style='color:red'>Sin Ningún registro</h1>";
    }

    echo "<h1><a href='EliminarPaciente.php'>Eliminar Cita</a></h1>";
    echo "<h1><a href='Registro.php'>Registro de Cita</a></h1>";
}
?>
