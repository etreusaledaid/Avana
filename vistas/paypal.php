<div id="content">
    <div class="g3">
        <?php
        include("../modelos/conectar_bd.php");
        conectar_bd();
        mysql_query("SET NAMES 'UTF8'");
        ?>
        <h2>Botones paypal</h2>
        <div class="g3">
            <form class='g1' action="../controladores/agregar_paypal.php">
                <div>
                    <h4>código de paypal</h4>
                    <textarea name="descripcion_paypal" cols="4" rows="1" placeholder="Descripción del producto"></textarea>
                    <textarea name="precio_paypal" cols="4" rows="1" placeholder="Precio"></textarea>
                    <textarea name="codigo_paypal" cols="10" rows="8" placeholder="Inserta el código html del boton de paypal cambiando las comillas dobles por comillas simples."></textarea>
                    <input class="button" type="submit" value="agregar">
                </div>
            </form>
            <div id="botones_paypal_2" class="g2">
                <table border="1" cellspacing="1" cellpadding="1">
                    <tr><td><b>Precio</b></td><td><b>Boton de paypal</b></td><td><b>Descripción</b></td><td><b>Eliminar</b></td></tr>
                    <?php
                    $sql_1='select idPaypal, Precio, Codigo_paypal, Descripcion from Codigos_paypal;';
                    $result_1=mysql_query($sql_1);
                    while($row=mysql_fetch_array($result_1))
                    {
                        printf('<tr><td>%s</td><td>%s</td><td>%s</td><td><a href="../controladores/eliminar_paypal.php?Id='.$row['idPaypal'].'">&nbsp;&nbsp;&nbsp;&nbsp;Eliminar</a></td></tr>',$row["Precio"],$row["Codigo_paypal"],$row["Descripcion"]);                   
                    }mysql_free_result($result_1);?>
                </table>
            </div>
        </div>
        <?php
        $sql_2='select idPaypal, Precio, Codigo_paypal, Descripcion from Codigos_paypal;';
        $result_2=mysql_query($sql_2);
        while($row=mysql_fetch_array($result_2))
        {   
        ?>
        <div class="g1">
            <form action="../controladores/editar_paypal.php" style="display:inline-block;">
                <div>
                    <textarea class="tip" name="idPaypal" cols="50" rows="1" readonly><?printf('%s',$row["idPaypal"]);?></textarea>
                    <textarea id="<?php echo $row['idPaypal'] ?>Descripcion" name="Descripcion" cols="50" rows="2" readonly><?printf('%s',$row["Descripcion"]);?></textarea>
                    <textarea id="<?php echo $row['idPaypal'] ?>Precio" name="Precio" cols="50" rows="2" readonly><?printf('%s',$row["Precio"]);?></textarea>
                    <?printf('%s',$row["Codigo_paypal"]);?>
                    <textarea id="<?php echo $row['idPaypal'] ?>Codigo_paypal" name="Codigo_paypal" cols="50" rows="10" readonly><?printf('%s',$row["Codigo_paypal"]);?></textarea>
                <div class="g1" align="left">
                    <input id="<?php echo $row['idPaypal'] ?>" class="button" type="submit" value="Aceptar" onclick="verPaypal(this.id)">
                </div>
                </div>
            </form>
            <div align="right" style="margin-top:-43px;">
                <input id="<?php echo $row['idPaypal'] ?>" class="button" type="submit" value="Editar" onclick="editarPaypal(this.id)">
            </div>
        </div>
        <?}mysql_free_result($result_2);?>
    </div>
</div>