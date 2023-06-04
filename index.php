<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>AVANA</title>
     
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Avana">
    <meta charset="UTF-8">

    <link rel="shortcut icon" href="images/images.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/css.css" rel="stylesheet" />
</head>

<body>
    <div align="center" style="margin-top:15%;margin-left:10%;">
        <form id="frmlogin" name="frmlogin"  method="POST" action="modelos/validarUsuario.php">
            <div class="g3">
                <table align="center" width="200px" style="display:inline;">
                    <tr>
                        <td colspan="2" align="center"><h3 style="color:#009fe3;">Iniciar sesi&oacute;n</h3></td>
                    </tr>
                    <tr>
                        <td style="color:white">Usuario</td>
                        <td>
                            <input class="text" type="text" name="usuario" id="usuario" class="required" maxlength="50">
                        </td>
                    </tr>
                    <tr>
                        <td style="color:white">Password</td>
                        <td>
                            <input class="text" type="password" name="password" id="password" class="required"  maxlength="50">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">
                            <input class="button" type="submit" name="enviar" value="Enviar" >
                        </td>
                     
                    </tr>
                    <?php
                     
                    //Mostrar errores de validacion de usuario, en caso de que lleguen
                     
                        if( isset( $_POST['msg_error'] ) )
                        {
                            switch( $_POST['msg_error'] )
                            {
                                case 1:
                            ?>
                            <script type="text/javascript">
                                jAlert("El usuario o password son incorrectos.", "Seguridad");
                                $("#password").focus();
                            </script>
                            <?php
                                break;         
                                case 2:
                            ?>
                            <script type="text/javascript">
                                jAlert("La seccion a la que intentaste entrar esta restringida.\n Solo permitida para usuarios registrados.", "Seguridad");
                            </script>
                            <?php       
                                break;
                            }       //Fin switch
                        }
                 
                        //Mostrar mensajes del estado del registro
                         
                        if( isset( $_POST['status_registro'] ) )
                        {
                            switch( $_POST['status_registro'] )
                            {
                                case 1:
                                if( $_POST['i_EmailEnviado'] ==1) {
                                ?>
                                    <script type="text/javascript">
                                        jAlert("Gracias, ha sido registrado exitosamente.\n Se le ha enviado un correo electronico de bienvenida, \npor favor, NO LO CONTESTE pues solo es informativo.", 'Registro');
                                    </script>
                                    <?php
                                } else {
                                    ?>
                                    <script type="text/javascript">
                                        jAlert("Gracias, ha sido registrado exitosamente.\n No se le ha podido enviar correo electronico de bienvenida, \nsin embargo, ya puede utilizar sus datos de acceso para iniciar sesion..", 'Registro');
                                    </script>
                                <?php
                                }
                                    break;         
                                default:
                            ?>
                                <script type="text/javascript">
                                    jAlert("Temporalmente NO se ha podido registrar, intente de nuevo mas tarde.", "Registro");
                                </script>
                            <?php       
                            }       //Fin switch
                        }
                    ?>
                </table>
                <img width="170px" style="display:inline;margin-bottom:-100PX;" src="images/images.png">
            </div>
        </form>
    </div>
</body>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $().ready(function() {
            $("#frmlogin").validate();
            $("#usuario").focus();
        });
    </script>
</html>
