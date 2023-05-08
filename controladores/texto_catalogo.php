<?php
include("../modelos/conectar_bd.php");
conectar_bd();
mysql_query("SET NAMES 'UTF8'");
$numero_catalogo=$_GET['numero_catalogo'];
$texto_catalogo=$_GET['texto_catalogo'];
$query="update Secciones set Descripcion = '".$texto_catalogo."' where idSecciones='".$numero_catalogo."'";
$datos=mysql_query($query);
if($datos){
header("location:../vistas/principal.php");
}
?>