<div id="content" align="center">
	<?php
	    include("../modelos/conectar_bd.php");
	    conectar_bd();
	    mysql_query("SET NAMES 'UTF8'");
	?>
	<form action="../controladores/agregar_producto.php" method="POST" enctype="multipart/form-data">
		<div id="agregar_producto" class="g2" align="left">
			<h4>Agregar un nuevo producto</h4>
				<textarea name="producto" cols="30" rows="1" placeholder="Nombre del producto"></textarea><br><br>
				<div>
					<p style="display:inline">Tamaño</p>&nbsp;&nbsp;&nbsp;&nbsp;
					<select name="tamano">
						<?
					    $sql='select Tamano from Tamano;';
					    $resultado=mysql_query($sql);
						while($row=mysql_fetch_array($resultado))
		        		{
						printf('<option value="'.$row['Tamano'].'">'.$row['Tamano'].'</option>');
						}?>
					</select>
				</div><br>
				<textarea name="medidas" cols="30" rows="1" placeholder="Medidas"></textarea><br><br>
				<div>
					<p style="display:inline">Precio</p>&nbsp;&nbsp;&nbsp;&nbsp;
					<select name="precio">
						<?
					    $sql_1='select idPaypal, Precio from Codigos_paypal;';
					    $resultado_2=mysql_query($sql_1);
						while($row=mysql_fetch_array($resultado_2))
		        		{
						printf('<option value="'.$row['idPaypal'].'">'.$row['Precio'].'</option>');
						}?>
					</select>
				</div><br>
				<div>
					<p style="display:inline">Modelo</p>&nbsp;&nbsp;&nbsp;&nbsp;
					<select name="modelo">
						<option value="Tapisado">Tapisado</option>
						<option value="Madera">Madera</option>
					</select>
				</div><br>
			    <p style="display:inline">Archivo: </p><input name="imagen" type="file" style="display:inline; color:white;"><br><br>
				<input class="button" name="agregar" type="submit" value="agregar">
		</div>
	</form>
	<div class="g3">
		<div class="g3">
			<h4>Ver por tamaño</h4>
			<select id="tamano" onchange="switchProducto()">
				<?
			    $sql_3='select Tamano from Tamano;';
			    $resultado_3=mysql_query($sql_3);
				while($row=mysql_fetch_array($resultado_3))
        		{
				printf('<option value="'.$row['Tamano'].'">'.$row['Tamano'].'</option>');
				}?>
			</select>
		</div>
		<div id="botones_paypal" class="g3" style="margin-top:20px;">
			<table border="1" cellspacing="1" cellpadding="1">
				<tr><td><b>Producto</b></td><td><b>Modelo</b></td><td><b>Tamaño</b></td><td><b>Medidas</b></td><td><b>Precio</b></td><td><b>Imagen</b></td><td><b>Paypal</b></td><td><b>Eliminar</b></td></tr>
				<?php
			    mysql_query("SET NAMES 'UTF8'");
			    $sql_2='select Titulo_producto, Modelo, Tamano, Medidas, Precio, Url_imagen, Codigo_paypal, idCatalogo from Catalogo, Tamano, Codigos_paypal where Catalogo.idTamano=Tamano.idTamano and Catalogo.idPaypal=Codigos_paypal.idPaypal;';
			    $result=mysql_query($sql_2);
		        while($row=mysql_fetch_array($result))
		        {
					printf('<tr><td id="producto'.$row['idCatalogo'].'" class="tamano '.$row["Tamano"].'">%s</td><td id="producto'.$row['idCatalogo'].'" class="tamano '.$row["Tamano"].'">%s</td><td id="tamano'.$row['idCatalogo'].'" class="tamano '.$row["Tamano"].'">%s</td><td id="medidas'.$row['idCatalogo'].'" class="tamano '.$row["Tamano"].'">%s</td><td id="precio'.$row['idCatalogo'].'" class="tamano '.$row["Tamano"].'">%s</td><td id="imagen'.$row['idCatalogo'].'" class="tamano '.$row["Tamano"].'"><img src="%s" style="width:100px;height:auto;"></td><td class="tamano '.$row["Tamano"].'">%s</td><td class="tamano '.$row["Tamano"].'"><a href="../controladores/eliminar_producto.php?Id='.$row['idCatalogo'].'">&nbsp;&nbsp;&nbsp;&nbsp;Eliminar</a></td></tr>',$row["Titulo_producto"],$row["Modelo"],$row["Tamano"],$row["Medidas"],$row["Precio"],$row["Url_imagen"],$row["Codigo_paypal"]);					
				}
				mysql_free_result($result);?>
			</table>
		</div>
	</div>
</div>

<!--
	printf('<tr><td class="Editar'.$row['idCatalogo'].'Terminado ocultar tamano"></td><td class="Editar'.$row['idCatalogo'].'Terminado ocultar tamano"></td><td class="Editar'.$row['idCatalogo'].'Terminado ocultar tamano"></td><td class="Editar'.$row['idCatalogo'].'Terminado ocultar tamano"></td><td class="Editar'.$row['idCatalogo'].'Terminado ocultar tamano"></td><td class="Editar'.$row['idCatalogo'].'Terminado ocultar tamano"><input id="'.$row['idCatalogo'].'" class="button" type="submit" value="cancelar" onclick="cancelar(this.id)"></td><form><td class="Editar'.$row['idCatalogo'].'Terminado ocultar tamano"><a href="../controladores/editar_producto.php?Precio='.$_POST['precio_paypal'].'">&nbsp;&nbsp;&nbsp;&nbsp;aceptar</a></td><td class="Editar'.$row['idCatalogo'].'Terminado ocultar tamano"><select name="precio_paypal">');
	$sql_4='select idPaypal, Precio from Codigos_paypal;';
	$resultado_4=mysql_query($sql_4);
	while($row=mysql_fetch_array($resultado_4))
	{
	printf('<option value="'.$row['idPaypal'].'">'.$row['Precio'].'</option>');
	}
	printf('</select></td></form></tr>');
	//$hola= $row['idPaypal'];
-->