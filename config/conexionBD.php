<?php
    #Cambiar puerto y borrar la contraseña
    $db_servername = "localhost:3307";
    $db_username = "root";
    $db_password = "root";
    $db_name = "examen";

    $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
    $conn->set_charset("utf8");
    # Probar conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        //echo "<p>Conexión exitosa!! :)</p>";
    }
?>