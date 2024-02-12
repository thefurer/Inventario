<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php  
    include ("php/config.php");
    ?>
</head>
<body>
    <div class="container">
        <h1>Consulta de Flora</h1>
        <div class="row">
            <div class="col-12">
                <table id="datos_flora" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td>Nombre Científico</td>
                            <td>Nombre Común</td>
                            <td>Familia</td>
                            <td>Descripción</td>
                            <td>Hábitat</td>
                            <td>Distribución</td>
                            <td>Usos Tradicionales</td>
                            <td>Estado de Conservación</td>
                            <td>Fecha de Registro</td>
                            <td>Ubicación de Registro</td>
                            <td>Observaciones</td>
                            <td>Editar</td>
                            <td>Eliminar</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM flora";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["nombrecientifico"] . "</td>";
                                echo "<td>" . $row["nombrecomun"] . "</td>";
                                echo "<td>" . $row["familia"] . "</td>";
                                echo "<td>" . $row["descripcion"] . "</td>";
                                echo "<td>" . $row["habitat"] . "</td>";
                                echo "<td>" . $row["distribucion"] . "</td>";
                                echo "<td>" . $row["usostradicionales"] . "</td>";
                                echo "<td>" . $row["estadodeconservacion"] . "</td>";
                                echo "<td>" . $row["fecharegistro"] . "</td>";
                                echo "<td>" . $row["ubicacionregistro"] . "</td>";
                                echo "<td>" . $row["observaciones"] . "</td>";
                                echo "<td><a href='editarflora.php?id=" . $row["id"] . "'>Editar</a></td>";
                                echo "<td><a href='eliminarflora.php?id=" . $row["id"] . "'>Eliminar</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "0 resultados";
                        }
                        $conn->close();
                        ?>
                </table>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#datos_flora').DataTable();
            });
        </script>
    </div>
</body>
</html>