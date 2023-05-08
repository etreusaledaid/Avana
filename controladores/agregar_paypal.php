<?php
include("../modelos/conectar_bd.php");
conectar_bd();
mysql_query("SET NAMES 'UTF8'");
$descripcion=$_GET['descripcion_paypal'];
$precio=$_GET['precio_paypal'];
$codigo=$_GET['codigo_paypal'];
$codigo = rawurlencode($codigo);
$codigo=rawurldecode(str_replace("%0D%0A","<br>",$codigo));
$query='insert into Codigos_paypal(Precio, Codigo_paypal, Descripcion)values("'.$precio.'","'.$codigo.'","'.$descripcion.'");';
$datos=mysql_query($query);
if($datos){
header("location:../vistas/principal.php");
}
?>