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
if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['edad']) && isset($_POST['email']) && isset($_POST['contraseña'])) {
    // Get data from form
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Validate password
    if (!preg_match("/[@,*]/", $contraseña) || strlen($contraseña) > 8) {
        echo '<script>alert("La contraseña debe contener al menos uno de los siguientes caracteres: @, *, , y no más de 8 caracteres");</script>';
        exit;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/\d/", $email)) {
        echo '<script>alert("El correo electrónico debe contener un número y el símbolo @");</script>';
        exit;
    }

    // Check if email already exists
    $sql = "SELECT * FROM Usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        echo '<script>alert("El correo electrónico ya está registrado");</script>';
        exit;
    }
    $stmt->close();

    // Insert data into database
    $sql = "INSERT INTO Usuario (nombre, apellido, edad, email, contraseña) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiss", $nombre, $apellido, $edad, $email, $contraseña);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo '<script>alert("Registro exitoso");</script>';
    } else {
        echo '<script>alert("Error al registrar");</script>';
    }

    $stmt->close();
} else {
    echo '<script>alert("Form data not received");</script>';
}

$conn->close();
?>