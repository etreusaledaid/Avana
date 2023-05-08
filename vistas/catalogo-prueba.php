<!--
<div id="content" align="center">
	<?php
	include("../modelos/conectar_bd.php");
	conectar_bd();
    mysql_query("SET NAMES 'UTF8'");
    ?>
	<div class="g3">
		<h4>Ver por tamaño</h4>
		<select id="tamanio" onchange="switchTamano()">
			<?
		    $sql_3='select Tamano from Tamano;';
		    $resultado_3=mysql_query($sql_3);
			while($row=mysql_fetch_array($resultado_3))
    		{
			printf('<option value="'.$row['Tamano'].'">'.$row['Tamano'].'</option>');
			}	mysql_free_result($result_3);?>
		</select>
	</div>
	    <?
	    $sql='select idCatalogo, Titulo_producto, Modelo, Medidas, Url_imagen, Tamano, Precio, Codigo_paypal from Catalogo, Tamano, Codigos_paypal where Catalogo.idTamano=Tamano.idTamano and Catalogo.idPaypal=Codigos_paypal.idPaypal;';
	    $result=mysql_query($sql);
	    while($row=mysql_fetch_array($result))
	    {?>
        <div class="g1">
            <form action="../controladores/editar_producto.php" style="display:inline-block;" method="POST" enctype="multipart/form-data">
                <div>
                    <textarea style="display:none;" class="tip" name="idCatalogo" cols="50" rows="1" readonly><?printf('%s',$row["idCatalogo"]);?></textarea>
                    <textarea name="Titulo_producto" cols="50" rows="2" readonly><?printf('%s',$row["Titulo_producto"]);?></textarea>
                    <textarea name="Tamano" cols="50" rows="2" readonly><?printf('%s',$row["Tamano"]);?></textarea>
                    <textarea name="Medidas" cols="50" rows="2" readonly><?printf('%s',$row["Medidas"]);?></textarea>
                    <textarea name="Precio" cols="50" rows="2" readonly><?printf('%s',$row["Precio"]);?></textarea>
                    <textarea name="Codigo_paypal" cols="50" rows="11" readonly><?printf('%s',$row["Codigo_paypal"]);?></textarea>
                </div>
                <div class="g1" align="left">
                    <input id="<?php echo $row['idCatalogo'] ?>" class="button" type="submit" value="Aceptar">
                </div>
            </form>
        </div>
		<?}
		mysql_free_result($result);?>
</div>
-->
<!--
<?php
include("../modelos/conectar_bd.php");
conectar_bd();
mysql_query("SET NAMES 'UTF8'");
$id=$_GET['idCatalogo'];
$titulo_producto=$_GET['Titulo_producto'];
$tamano=$_GET['Tamano'];
$medidas=$_GET['Medidas'];
$precio=$_GET['Precio'];
$codigo=$_GET['Codigo_paypal'];
$query="update Catalogo set Titulo_producto = '".$titulo_producto."', Tamano = '".$tamano."', Medidas = '".$medidas."', Precio = '".$precio."', Codigo_paypal = '".$codigo."' where idPaypal='".$id."'";
$datos=mysql_query($query);
if($datos){
header("location:../vistas/principal.php");
}
?>
-->

<div id="content" align="center">
	<?php
	include("../modelos/conectar_bd.php");
	conectar_bd();
    mysql_query("SET NAMES 'UTF8'");
    ?>
	<div class="g3">
		<h4>Ver por tamaño</h4>
		<select id="tamanio" onchange="switchTamano()">
			<?
		    $sql_3='select Tamano from Tamano;';
		    $resultado_3=mysql_query($sql_3);
			while($row=mysql_fetch_array($resultado_3))
    		{
			printf('<option value="'.$row['Tamano'].'">'.$row['Tamano'].'</option>');
			}	mysql_free_result($result_3);?>
		</select>
	</div>
    <?
    $sql='select idCatalogo, Titulo_producto, Modelo, Medidas, Url_imagen, Tamano, Precio, Codigo_paypal from Catalogo, Tamano, Codigos_paypal where Catalogo.idTamano=Tamano.idTamano and Catalogo.idPaypal=Codigos_paypal.idPaypal;';
    $result=mysql_query($sql);
    while($row=mysql_fetch_array($result))
    {
		printf('<div id="catalogo'.$row['idCatalogo'].'" class="tamanio '.$row["Tamano"].' g1"><h3>'.$row["Titulo_producto"].'</h3><div style="width:150; height:150;"><img src="'.$row["Url_imagen"].'" alt="" width="100" height="auto"></div>');
		printf('<p>'.$row["Titulo_producto"].'</p><p>'.$row["Tamano"].'</p><p>'.$row["Medidas"].'</p><p>'.$row["Precio"].'</p><div>'.$row["Codigo_paypal"].'</div></div>');			
	}
	mysql_free_result($result);?>
</div>