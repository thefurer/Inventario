<?php
$servidor = "localhost";
$base_de_datos = "anegado";
$usuario = "root";
$clave = "";
$conn = new mysqli($servidor, $usuario, $clave, $base_de_datos);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>