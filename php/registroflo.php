<?php
if ($_SERVER ['REQUEST_METHOD']== 'POST'){
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

    $nombrecientifico = $_POST["nombrecientifico"];
    $nombrecomun= $_POST["nombrecomun"];
    $familia = $_POST["familia"];
    $descripcion = $_POST["descripcion"];
    $habitat = $_POST["habitat"];
    $distribucion = $_POST["distribucion"];
    $usostradicionales = $_POST["usostradicionales"];
    $estadodeconservacion = $_POST["estadodeconservacion"];
    $fecharegistro = $_POST["fecharegistro"];
    $ubicacionregistro = $_POST["ubicacionregistro"];
    $observaciones = $_POST["observaciones"];

    $sql = "INSERT INTO flora (nombrecientifico, nombrecomun, familia, descripcion, habitat, distribucion, usostradicionales, estadodeconservacion, fecharegistro, ubicacionregistro, observaciones) VALUES ('$nombrecientifico', '$nombrecomun', '$familia', '$descripcion', '$habitat', '$distribucion', '$usostradicionales', '$estadodeconservacion', '$fecharegistro', '$ubicacionregistro', '$observaciones')";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssi", $nombrecientifico, $nombrecomun, $familia, $descripcion, $habitat, $distribucion, $usostradicionales, $estadodeconservacion, $fecharegistro, $ubicacionregistro, $observaciones);

    if ($stmt->execute()) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
