<?php
include("../modelos/conectar_bd.php");
conectar_bd();
mysql_query("SET NAMES 'UTF8'");
$id=$_GET['idPaypal'];
$descripcion=$_GET['Descripcion'];
$precio=$_GET['Precio'];
$codigo=$_GET['Codigo_paypal'];
$query="update Codigos_paypal set Precio = '".$precio."', Codigo_paypal = '".$codigo."', Descripcion = '".$descripcion."' where idPaypal='".$id."'";
$datos=mysql_query($query);
if($datos){
header("location:../vistas/principal.php");
}
?>