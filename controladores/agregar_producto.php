<?php
include("../modelos/conectar_bd.php");
conectar_bd();
mysql_query("SET NAMES 'UTF8'");
$producto=$_POST['producto'];
$tamano=$_POST['tamano'];
if($tamano=="sencillo"){
	$tamano="1";	
}
if($tamano=="mediano"){
	$tamano="2";	
}
if($tamano=="grande"){
	$tamano="3";	
}
if($tamano=="varios"){
	$tamano="4";	
}
$medidas=$_POST['medidas'];
$precio=$_POST['precio'];
$modelo=$_POST['modelo'];
$imagen=$_FILES['imagen']['name'];
$url_imagen='../images/'.$imagen;
$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $url_imagen);
$query='insert into Catalogo(Titulo_producto, Modelo, idTamano, Medidas, idPaypal, Url_imagen)values("'.$producto.'","'.$modelo.'","'.$tamano.'","'.$medidas.'","'.$precio.'","'.$url_imagen.'");';
$datos=mysql_query($query);
if($datos){
header("location:../vistas/principal.php");
}
?>