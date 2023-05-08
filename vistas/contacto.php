<div id="content">
    <h2>Datos de usuarios</h2>
		<?php
		include("../modelos/conectar_bd.php");
	    conectar_bd();
		$sql='select Usuarios.id_usuario, Usuarios.tx_nombre, Usuarios.tx_apellidoPaterno, Usuarios.tx_apellidoMaterno, ctg_tiposusuario.tx_TipoUsuario from Usuarios, ctg_tiposusuario  where Usuarios.id_TipoUsuario=ctg_tiposusuario.id_TipoUsuario;';
		$result=mysql_query($sql);
		?>
		<table border="1" cellspacing="1" cellpadding="1">
			<tr><td><b>Nombre</b></td><td><b>Apellido Paterno</b></td><td><b>Apellido Materno</b></td><td><b>Tipo de usuario</b></td></tr>
		 <?php
			while($row=mysql_fetch_array($result))
			{	
				printf('<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',$row["tx_nombre"],$row["tx_apellidoPaterno"],$row["tx_apellidoMaterno"],$row["tx_TipoUsuario"]);
			}
			mysql_free_result($result);
			?>
		</table>
</div>c