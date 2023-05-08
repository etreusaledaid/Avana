<?php
include("../modelos/conectar_bd.php");
conectar_bd();
mysql_query("SET NAMES 'UTF8'");
$id=$_GET['idTip'];
$titulo=$_GET['Titulo'];
$consejo=$_GET['Consejo'];
$query="update Tip set Titulo = '".$titulo."', Consejo = '".$consejo."' where idTip='".$id."'";
$datos=mysql_query($query);
if($datos){
header("location:../vistas/principal.php");
}
?>