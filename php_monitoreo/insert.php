<?php
include("conexion.php");
$con = connection();

$id = null;
$especie = $_POST['especie'];
$tipo = $_POST['tipo'];
$condiciones = $_POST['condiciones_climaticas'];
$notas= $_POST['notas_adicionales'];
$comportamiento = $_POST['comportamiento'];
$estado = $_POST['estado'];
$observacion = $_POST['observacion'];
$fecha = $_POST['fecha'];
$ubicacion = $_POST['ubicacion'];

$sql = "INSERT INTO monitoreo VALUES('$id','$especie','$tipo','$condiciones','$notas',
'$comportamiento','$estado','$observacion','$fecha','$ubicacion')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
}else{

}

?>