<div id="content">
    <div class="g3">
        <h2>Catalogo</h2>
        <?php
        include("../modelos/conectar_bd.php");
        conectar_bd();
        mysql_query("SET NAMES 'UTF8'");
        $sql='select Secciones.idSecciones, Secciones.Seccion, Secciones.Descripcion from Secciones where Seccion="Catalogo";';
        $result=mysql_query($sql);
        while($row=mysql_fetch_array($result))
        {   
        ?>
        <div>
	        <form action="../controladores/texto_catalogo.php">
	        	<textarea name="numero_catalogo" style="display:none;" readonly><?php echo $row['idSecciones']?></textarea>
                <textarea id="<?php echo $row['idSecciones']?>TextoCatalogo" name="texto_catalogo" cols="50" rows="5" readonly><?printf('%s',$row["Descripcion"]);?></textarea>
	            <div align="left">
	                <input id="<?php echo $row['idSecciones']?>" class="button" type="submit" value="Aceptar" onclick="verTextoCatalogo(this.id)">
	            </div>
            </form>
            <div align="right" style="margin-top:-43px;">
                <input id="<?php echo $row['idSecciones']?>" class="button" type="submit" value="Editar" onclick="editarTextoCatalogo(this.id)">
            </div>
        </div>
        <?}mysql_free_result($result);?>
    </div>
</div>