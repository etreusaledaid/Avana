<?php
include("../modelos/conectar_bd.php");
conectar_bd();
mysql_query("SET NAMES 'UTF8'");
$color=$_POST['color'];
$material=$_POST['material'];
if($material=="Peluche Alaska"){
	$material="1";	
}
if($material=="Peluche Estilo 97"){
	$material="2";	
}
if($material=="Peluche Toallin (Jazmin)"){
	$material="3";	
}
if($material=="Peluche Toalln (Olas)"){
	$material="4";	
}
if($material=="Velvoa Estampada"){
	$material="5";
}
$imagen=$_FILES['imagen']['name'];
$url_imagen='../images/'.$imagen;
$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $url_imagen);
$query='insert into Colores(Color, idMateriales, Url_imagen)values("'.$color.'","'.$material.'","'.$url_imagen.'");';
$datos=mysql_query($query);
if($datos){
header("location:../vistas/principal.php");
}
?>