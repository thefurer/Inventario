<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "anegado";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $nombrecientifico = $_POST["nombre_cientifico"];
    $nombrecomun = $_POST["nombre_comun"];
    $familia = $_POST["familia"];
    $descripcion = $_POST["descripcion"];
    $habitat = $_POST["habitat"];
    $distribucion = $_POST["distribucion"];
    $usostradicionales = $_POST["usos_tradicionales"];
    $estadodeconservacion = $_POST["estado_conservacion"];
    $fecharegistro = $_POST["fecha_registro"];
    $ubicacionregistro = $_POST["ubicacion_registro"];
    $observaciones = $_POST["observaciones"];

    $sql = "INSERT INTO flora (nombrecientifico, nombrecomun, familia, descripcion, habitat, distribucion, usostradicionales, estadodeconservacion, fecharegistro, ubicacionregistro, observaciones) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssssssssss", $nombrecientifico, $nombrecomun, $familia, $descripcion, $habitat, $distribucion, $usostradicionales, $estadodeconservacion, $fecharegistro, $ubicacionregistro, $observaciones);

    if ($stmt->execute()) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
