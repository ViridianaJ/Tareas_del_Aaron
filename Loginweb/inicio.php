<?php
// se usa el requiere para si psi se necesita el archivo conexion
require "conexion.php";
mysqli_set_charset($conexion,'utf8');


//genear el query
$consulta_sql="SELECT * FROM paciente";

//mandar el query por medio de la conexion y almacenaremos el resultado en una variable
$resultado = $conexion->query($consulta_sql);

// Retorna el numero de filas del resultado. Si encuentra mas de uno lo usamos para imprimir el resultado en nuestra tabla
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
    //aqui se pintarian los registro de la DB
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
    
