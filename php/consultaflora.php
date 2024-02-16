<?php
$servidor = "localhost";
$base_de_datos = "anegado";
$usuario = "root";
$clave = "";
$conn = new mysqli($servidor, $usuario, $clave, $base_de_datos);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM flora";
$result = $conn->query($sql);
$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data[] = "0 resultados";
}
$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
