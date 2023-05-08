<div id="content">
    <div class="g3">
        <h2>Consejos</h2>
        <form class="g3" action="../controladores/nuevo_consejo.php">
            <div class="g2">
                <textarea name="nuevo_titulo" cols="50" rows="1" placeholder="nuevo titulo...."></textarea>
                <textarea name="nuevo_consejo" cols="50" rows="10" placeholder="nuevo consejo...."></textarea>
            </div>
            <div class="g1">
                <input class="button" type="submit" value="Agregar">
                <p style="font-size:20px;margin-top:20px;">Si deseas agregar un nuevo consejo o editar alguno.</p>
            </div>
        </form>
        <?php
        include("../modelos/conectar_bd.php");
        conectar_bd();
        mysql_query("SET NAMES 'UTF8'");
        $sql='select Tip.idTip, Tip.Titulo, Tip.Consejo from Tip;';
        $result=mysql_query($sql);
        while($row=mysql_fetch_array($result))
        {   
        ?>
        <div class="g1">
            <form action="../controladores/tips.php" style="display:inline-block;">
                <div>
                    <textarea class="tip" name="idTip" cols="50" rows="1" readonly><?printf('%s',$row["idTip"]);?></textarea>
                    <textarea id="<?php echo $row['idTip'] ?>Tip" name="Titulo" cols="50" rows="2" readonly><?printf('%s',$row["Titulo"]);?></textarea>
                    <textarea id="<?php echo $row['idTip'] ?>Consejo" name="Consejo" cols="50" rows="10" readonly><?printf('%s',$row["Consejo"]);?></textarea>
                </div>
                <div class="g1" align="left">
                    <input id="<?php echo $row['idTip'] ?>" class="button" type="submit" value="Aceptar" onclick="verTip(this.id)">
                </div>
            </form>
            <div align="right" style="margin-top:-43px;">
                <input id="<?php echo $row['idTip'] ?>" class="button" type="submit" value="Editar" onclick="editarTip(this.id)">
            </div>
        </div>
        <?}mysql_free_result($result);?>
    </div>
</div>