<?php
include("../modelos/conectar_bd.php");
conectar_bd();
mysql_query("SET NAMES 'UTF8'");
$descripcion=$_GET['Descripcion'];
$query="update Secciones set descripcion = '".$descripcion."' where idSecciones='1'";
$datos=mysql_query($query);
if($datos){
header("location:../vistas/principal.php");
}
?>