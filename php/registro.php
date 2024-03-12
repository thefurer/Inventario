<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Inventario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        h1 {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registro de Inventario</h1>
        <!-- Registro de inventario -->
        <form action="registro.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required>
            <label for="descripcion">Descripción</label>
            <input type="text" name="descripcion" id="descripcion" required>
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" required>
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" required>
            <input type="submit" value="Registrar">
        </form>
        
        <?php 
            if(isset($_GET['error'])){
                echo "<h2>Hubo un error al registrar el producto</h2>";
            } elseif (isset($_GET['correcto'])) {
                echo "<h2>Producto registrado correctamente</h2>";
            }
            
            $conexion = mysqli_connect("localhost", "root", "", "anegado");
            if (!$conexion) {
                die("Error al conectar: " . mysqli_connect_error());
            }

            //Consulta a la base de datos para mostrar los registros existentes en la tabla Inventario
            $consulta = "SELECT * FROM inventario";
            $resultado = mysqli_query($conexion, $consulta);

            if (!$resultado) {
                die("Error al consultar: " . mysqli_error($conexion));
            }
        ?>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
            <?php 
                while($fila = mysqli_fetch_array($resultado)){
                    echo "<tr>";
                    echo "<td>".$fila['nombre']."</td>";
                    echo "<td>".$fila['descripcion']."</td>";
                    echo "<td>".$fila['cantidad']."</td>";
                    echo "<td>".$fila['precio']."</td>";
                    echo "</tr>";
                }
                mysqli_close($conexion);
            ?>
        </table>
    </div>
</body>
</html>
