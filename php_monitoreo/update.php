<?php 
    include("conexion.php");
    $con=connection();

    $id=$_GET['id'];

    $sql="SELECT * FROM monitoreo WHERE id='$id'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/monitoreo.css" rel="stylesheet">
       
        <title>EDITAR DATOS</title>
        
    </head>
    <body>
   
    <h2 id="verde">EDITAR DATOS</h2>
            <form class="content" action="../php_monitoreo/edit.php" method="post">
               
            <div class="form-group">
            <label for="especie">ID:</label>
            <input type="text" name="id" value="<?= $row['id']?>" readonly>
            </div>
            <div class="form-group">
                <label for="especie">Especie:</label>
                <input type="text" class="form-control" id="especie" name="especie" required value="<?= $row['especie']?>">
            </div>
            <div class="form-group">
                <label for="tipo">Tipo (Flora/Fauna):</label>
                <select class="form-control" id="tipo" name="tipo" required>
    <option value="">Seleccione...</option>
    <option value="flora" <?php if ($row['tipo'] == 'flora') echo 'selected'; ?>>Flora</option>
    <option value="fauna" <?php if ($row['tipo'] == 'fauna') echo 'selected'; ?>>Fauna</option>
</select>

            </div>
            <div class="form-group campos-flora">
                <label for="condiciones_climaticas">Condiciones Climáticas:</label>
                <input type="text" class="form-control" id="condiciones_climaticas" name="condiciones_climaticas" value="<?= $row['condiciones']?>">
            </div>
            <div class="form-group campos-flora">
                <label for="notas_adicionales_flora">Notas Adicionales:</label>
            
                <textarea class="form-control" id="notas_adicionales" name="notas_adicionales" rows="3"><?=$row['notas']?></textarea>
            </div>
        
            <div class="form-group campos-fauna">
                <label for="comportamiento">Comportamiento:</label>

                <textarea class="form-control" id="comportamiento" name="comportamiento" rows="3" ><?= $row['comportamiento']?></textarea>
            </div>
            <div class="form-group campos-fauna">
                <label for="estado_conservacion">Estado de Conservación:</label>
                <input type="text" class="form-control" id="estado" name="estado" value="<?= $row['estado']?>">
            </div>
            <div class="form-group">
                <label for="observacion">Observación:</label>
                <textarea class="form-control" id="observacion" name="observacion" rows="3" required><?= $row['observacion']?></textarea>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de la Observación:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required
                value="<?= $row['fecha']?>">
            </div>
            <div class="form-group">
                <label for="ubicacion">Ubicación de la Observación:</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" required
                value="<?= $row['ubicacion']?>">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    
    
    </body>
</html>