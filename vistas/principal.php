<?php
 
//Inicializar una sesion de PHP
session_start();
 
//Validar que el usuario este logueado y exista un UID
if ( ! ($_SESSION['autenticado'] == 'SI' && isset($_SESSION['uid'])) )
{
    //En caso de que el usuario no este autenticado, crear un formulario y redireccionar a la
    //pantalla de login, enviando un codigo de error
?>
        <form name="formulario" method="post" action="index.php">
            <input type="hidden" name="msg_error" value="2">
        </form>
        <script type="text/javascript">
            document.formulario.submit();
        </script>
<?php
}
 
    //Conectar BD
    include("../modelos/conectar_bd.php"); 
    conectar_bd();
 
    //Sacar datos del usuario que ha iniciado sesion
    $sql = "SELECT  tx_nombre,tx_apellidoPaterno,tx_TipoUsuario,id_usuario
            FROM Usuarios
            LEFT JOIN ctg_tiposusuario
            ON Usuarios.id_TipoUsuario = ctg_tiposusuario.id_TipoUsuario
            WHERE id_usuario = '".$_SESSION['uid']."'";        
    $result     =mysql_query($sql);
 
    $nombreUsuario = "";
 
    //Formar el nombre completo del usuario
    if( $fila = mysql_fetch_array($result) )
        $nombreUsuario = $fila['tx_nombre']." ".$fila['tx_apellidoPaterno'];
     
//Cerrrar conexion a la BD
mysql_close($conexio);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="CMS de Avana">
    <meta name="author" content="yussel">
    <meta charset="UTF-8">

    <title>Avana</title>
    <link rel="shortcut icon" href="../images/images.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="../css/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../css/css.css" rel="stylesheet" />
</head>
<body topmargin="0" style="width:100%;height:auto;">
<table align="right" width="350px" border="0">
<tr>                                              <!-- Dar Bienvenida al usuario -->
    <td  width="100px" align="right" style="color:white">Bienvenido <b><?php echo $nombreUsuario ?></b></td>
    <td  width="15px" align="center">
        <!-- Proporcionar Link para cerrar sesion -->
        <a href="../modelos/cerrarSesion.php">Cerrar sesi&oacute;n</a>
    </td>
</tr>
</table>
       
<div class="g3 top">
        <h1>AVANA</h1>
        <nav id="nav">
            <ul>
                <li><a href="principal.php">Bienvenido</a></li>
                <li><a href="historia.php">Quienes Somos</a></li>
                <li><a href="informacion.php">Consejos</a></li>
                <li><a href="catalogo.php">Catalogo</a></li>
                <li><a href="producto.php">Producto</a></li>
                <li><a href="paypal.php">Botones paypal</a></li>
                <li><a href="materiales.php">Material</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="catalogo-prueba.php">Pruebas</a></li>
            </ul>
        </nav>
    <div id="wrapper">
        <header>
            <div class="g1">
                <img style="width:35%" src="../images/images.png">
            </div>
            <div class="g2">
                <h3>Bienvenido</h3>
                <p>No olvides revisar los cambios.</p>
                <p>Si deseas registrar a un nuevo usuario.</p>
                <a href="registro.php">Registro</a>
            </div>
        </header>
        <div class="cf"></div>
        <div id="content">
            <div class="g3">
                <h3>Sistema de gestión de contenido</h3>
                <p>El sistema se encarga de:</p>
                <p>Gestionan los datos que almacenan.
                <p>Gestionan los usuarios que utilizan la información, que además pueden agregarla.</p>
                <p>Posee una interfaz en correspondencia con la información que contienen.</p>
            </div>
            <div class="g3">
                <h3>Las 3 importantes correspondencias en la base de datos al momento de subir información, editarla o eliminar es en:</h3>
            </div>
            <div class="g1">
                <h5>En la seccion de PRODUCTOS</h5>
            </div>
            <div class="g1">
                <h5>En la seccion de BOTONES PAYPAL</h5>
            </div>
            <div class="g1">
                <h5>En la seccion de MATERIALES</h5>
            </div>
        </div>
        <footer class="g3 cf">
            <small>2015 <span class="license">Created by </span></small>
        </footer>   
    </div>
</div>  
</body>
<script type="text/javascript" src="../js/respond.min.js"></script>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<!-- HTML5 IE Enabling Script -->
<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
</html>