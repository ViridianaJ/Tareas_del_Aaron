<?php

require "conexion.php";
mysqli_set_charset($conexion,'utf8');



$consulta_sql="SELECT * FROM paciente";


$resultado = $conexion->query($consulta_sql);


$count = mysqli_num_rows($resultado); 
 
echo "<table border='2' >
    <tr>
        <th>Paciente</th>
        <th>No de Carnet</th>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Fecha de Cita</th>
        <th>Correo</th>
        <th>Telefono</th>

    </tr>";

if ( $count>0 ){
   
    while( $row = mysqli_fetch_assoc($resultado)  ){
     echo "<tr>";
     echo"<td>". $row['paciente'] ."</td>";
     echo"<td>". $row['n_carnet'] ."</td>";
     echo"<td>". $row['nombre'] ."</td>";
     echo"<td>". $row['edad'] ."</td>";
     echo"<td>". $row['fecha_cita'] ."</td>";
     echo"<td>". $row['email'] ."</td>";
     echo"<td>". $row['telefono'] ."</td>";

     echo "</tr>";
     
    }
    echo "</table>";

}else{
    
    ?>
    
    <h1 style='color:red' >Sin Ningun registro</h1>
<?php } ?>
    <h1><a href='EliminarUsuario.php'>Eliminar Cita</a></h1>
    <h1><a href='Registro.php'>Registro de cita</a></h1>
    



