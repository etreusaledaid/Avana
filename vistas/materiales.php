<div id="content" align="center">
	<?php
	include("../modelos/conectar_bd.php");
	conectar_bd();
    mysql_query("SET NAMES 'UTF8'");
	?>
	<div class="g2">
		<div class="g3">
			<h4>Ver por material</h4>
			<select id="material" onchange="switchMaterial()">
				<option value="Peluche Alaska">Alaska</option>
				<option value="Peluche Estilo 97">Estilo</option>
				<option value="Peluche Toallin (Jazmin)">Toallin</option>
				<option value="Peluche Toalln (Olas)">Toalln</option>
				<option value="Velvoa Estampada">Velvoa</option>
			</select>
		</div>
		<div class="g3" style="margin-top:20px;">
			<table border="1" cellspacing="1" cellpadding="1">
				<tr><td><b>Color</b></td><td><b>Material</b></td><td><b>Imagen</b></td><td><b>Eliminar</b></td></tr>
				<?php
		        $sql='select Color, Material, idColores Url_imagen from Colores, Materiales where Colores.idMateriales=Materiales.idMateriales;';
		        $result=mysql_query($sql);
		        while($row=mysql_fetch_array($result))
		        {
					printf('<tr><td class="material '.$row["Material"].'">%s</td><td class="material '.$row["Material"].'">%s</td><td class="material '.$row["Material"].'"><img src="%s" style="width:100px;height:auto;"></td><td class="material '.$row["Material"].'"><a href="../controladores/eliminar_material.php?Id='.$row['idColores'].'">&nbsp;&nbsp;&nbsp;&nbsp;Eliminar</a></td></tr>',$row["Color"],$row["Material"],$row["Url_imagen"]);
				}
				mysql_free_result($result);?>
			</table>
		</div>
	</div>
	<div class="g1" align="left">
		<h4>Agregar un nuevo material</h4>
		<form action="../controladores/agregar_material.php" method="POST" enctype="multipart/form-data">
			<textarea name="color" cols="30" rows="1" placeholder="Color del producto"></textarea><br><br>
			<div>
				<p style="display:inline">Material</p>&nbsp;&nbsp;&nbsp;&nbsp;
				<select name="material">
					<option value="Peluche Alaska">Peluche Alaska</option>
					<option value="Peluche Estilo 97">Peluche Estilo 97</option>
					<option value="Peluche Toallin (Jazmin)">Peluche Toallin (Jazmin)</option>
					<option value="Peluche Toalln (Olas)">Peluche Toalln (Olas)</option>
					<option value="Velvoa Estampada">Velvoa Estampada</option>
				</select><br><br>
			    <p style="display:inline">Archivo:</p><input name="imagen" type="file" style="display:inline; color:white;"><br><br>
				<input class="button" name="agregar" type="submit" value="agregar">
			</div>
		</form>
	</div>
</div>