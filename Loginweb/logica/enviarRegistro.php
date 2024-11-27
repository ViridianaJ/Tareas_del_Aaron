<?php
include "./conexion.php";
mysqli_set_charset($conexion, 'utf8');

// Verificar si los datos del formulario han sido enviados
if (isset($_POST['n_carnet'], $_POST['nombre'], $_POST['edad'], $_POST['fecha_cita'], $_POST['email'], $_POST['telefono'])) {
    
    // Recibir los valores enviados desde el formulario
    $n_carnet = $_POST['n_carnet'];  // Número de carnet
    $nombre = $_POST['nombre'];  // Nombre del paciente
    $edad = $_POST['edad'];  // Edad del paciente
    $fecha_cita = $_POST['fecha_cita'];  // Fecha de la cita
    $email = $_POST['email'];  // Correo electrónico
    $telefono = $_POST['telefono'];  // Teléfono

    // Verificar si el paciente ya está registrado
    // Aquí verificamos si ya existe el mismo número de carnet para evitar duplicados
    $stmt = $conexion->prepare("SELECT * FROM paciente WHERE n_carnet = ?");
    $stmt->bind_param("s", $n_carnet);  // 's' indica que el parámetro es una cadena (texto)
    $stmt->execute();
    $resultado = $stmt->get_result();
    $count = $resultado->num_rows;

    if ($count == 1) {
        // Si ya está registrado
        echo "El paciente ya está registrado";
        echo "<a href='./Registro.php'>Nuevo registro</a>";
    } else {
        // Si no está registrado, insertar los datos en la base de datos
        // Aquí insertamos el nombre del paciente y otros datos
        $stmt = $conexion->prepare("INSERT INTO paciente (n_carnet, nombre, edad, fecha_cita, email, telefono) 
                                    VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $n_carnet, $nombre, $edad, $fecha_cita, $email, $telefono);

        if ($stmt->execute()) {
            // Si la inserción fue exitosa
            echo "<br><h1>Paciente creado con éxito</h1>";
            echo "<a href='./Registro.php'>Nuevo registro</a>";
            echo "<a href='./index.php'>Ver registros</a>";
        } else {
            // Si ocurre un error al insertar
            echo "Error al insertar el paciente: " . $stmt->error;
        }

        // Cerrar la sentencia preparada
        $stmt->close();
    }

} else {
    echo "Faltan datos en el formulario. Por favor, completa todos los campos.";
}
?>
