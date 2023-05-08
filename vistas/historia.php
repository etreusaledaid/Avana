<div id="content">
    <h2>Quienes somos</h2>
		<?php
		include("../modelos/conectar_bd.php");
	    conectar_bd();
	    mysql_query("SET NAMES 'UTF8'");
		$sql='select Secciones.idSecciones, Secciones.Descripcion from Secciones where Secciones.Seccion="Quienes Somos";';
		$result=mysql_query($sql);

		while($row=mysql_fetch_array($result))
		{	
			printf('<div class="g3"><p id="quienes_somos">%s</p></div>',$row["Descripcion"]);
		?>
		<form action="../controladores/quienes_somos.php">
			<textarea name="Descripcion" id="contenido" class="g3" cols="30" rows="10" style="text-align:justify; padding:20px;" readonly><?printf('%s',$row["Descripcion"]);?>
			</textarea>
			<div class="g1" align="left"><input class="button" type="submit" value="Aceptar" onclick="ver()"></div>
		</form>
		<?php
		}
		mysql_free_result($result);
		?>
	<div class="g3" align="right" style="margin-top:-43px;"><input class="button" type="submit" value="Editar" onclick="editar()"></div>
</div>