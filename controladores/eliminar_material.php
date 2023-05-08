<?php
include("../modelos/conectar_bd.php");
conectar_bd();
mysql_query("SET NAMES 'UTF8'");
$id=$_GET['Id'];
$query='delete from Colores where idColores="'.$id.'"';
$datos=mysql_query($query);
if($datos){
header("location:../vistas/principal.php");
}
?>