<?php
$servidor = "localhost";
$base_de_datos = "anegado";
$usuario = "root";
$clave = "";
$conn = new mysqli($servidor, $usuario, $clave, $base_de_datos);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Check if form data is set
if (isset($_POST['email']) && isset($_POST['contraseña'])) {
    // Get data from form
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Check if email exists in database
    $sql = "SELECT * FROM Usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($user['contraseña'] == $contraseña) {
            header("Location: menu1.html");
            exit;
        } else {
            echo 'Contraseña incorrecta';
        }
    } else {
        echo 'Correo no registrado';
    }

    $stmt->close();
} else {
    echo 'Form data not received';
}

$conn->close();
?>