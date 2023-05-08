<?php
include("../modelos/conectar_bd.php");
conectar_bd();
mysql_query("SET NAMES 'UTF8'");
$titulo=$_GET['nuevo_titulo'];
$consejo=$_GET['nuevo_consejo'];
$query='insert into Tip(Titulo,Consejo)values("'.$titulo.'","'.$consejo.'");';
$datos=mysql_query($query);
if($datos){
header("location:../vistas/principal.php");
}
?>