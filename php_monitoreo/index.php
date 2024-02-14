<?php
include("conexion.php");
$con = connection();

$sql = "SELECT * FROM monitoreo";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/crud.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/monitoreo.css">
   
    <title>CONSULTA DE REGISTROS</title>
</head>

<body>
  

    <div class="users-table">
        <h2>CONSULTA DE REGISTROS</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Especie</th>
                    <th>Tipo (Flora/Fauna)</th>
                    <th>Condiciones Climáticas</th>
                    <th>Notas Adicionales</th>
                    <th>Comportamiento</th>
                    <th>Estado de Conservación</th>
                    <th>Observación</th>
                    <th>Fecha de la Observación</th>
                    <th>Ubicación de la Observación</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <th><?= $row['id'] ?></th>
                        <th><?= $row['especie'] ?></th>
                        <th><?= $row['tipo'] ?></th>
                        <th><?= $row['condiciones'] ?></th>
                        <th><?= $row['notas'] ?></th>
                        <th><?= $row['estado'] ?></th>
                        <th><?= $row['observacion'] ?></th>
                        <th><?= $row['comportamiento'] ?></th>
                        <th><?= $row['fecha'] ?></th>
                        <th><?= $row['ubicacion'] ?></th>
                        <th><a href="update.php?id=<?= $row['id'] ?>" class="users-table--edit">Editar</a></th>
                        <th><a href="delete.php?id=<?= $row['id'] ?>" class="users-table--delete" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>