<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" >
    <title>Odontología</title>
</head>
<body>

    <header>
        <h3>Registro de Cita para Pacientes de Odontología</h3>
    </header>
    
    <div>
        <form action="./enviarRegistro.php" method="POST">
            <hr>
            <div>
                <!-- Número de carnet -->
                <label for="n_carnet">Ingresa Número de carnet:</label>
                <input type="text" name="n_carnet" required maxlength="100" placeholder="Ingresa No. de carnet">
                <br><br>

                <!-- Nombre -->
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" required maxlength="100" placeholder="Ingresa tu nombre">
                <br><br>

                <!-- Edad -->
                <label for="edad">Edad:</label>
                <input type="number" name="edad" required maxlength="100" placeholder="Ingresa tu Edad">
                <br><br>

                <!-- Fecha de cita -->
                <label for="fecha_cita">Fecha para tu cita:</label>
                <input type="date" name="fecha_cita" required>
                <br><br>

                <!-- Correo -->
                <label for="email">Correo:</label>
                <input type="email" name="email" required maxlength="100" placeholder="Ingresa Correo Electrónico">
                <br><br>

                <!-- Teléfono -->
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" required maxlength="8" placeholder="Ingresa tu teléfono">
                <br><br>
            </div>
            <button type="submit" name="submit">Enviar registro</button>
        </form>
    </div>

    <br><br>
    <a href="Registro.php">Nuevo registro</a><br><br>
    <a href="index.php">Ver registro</a><br><br>
    <a href="Principal.php">Regresar</a>

</body>
</html>
