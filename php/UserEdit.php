<?php
    if($_POST['hidVal']==1){
        unset($_GET);
        include_once './DataBase.php';
        $conexion = new DataBase();
        $conexion->connectDataBase();
        $sqlUpdate = "UPDATE `db_csv`.`tbl_users`
                        SET
                            `txt_first_name` = '".$_POST['txtNombre']."',
                            `txt_last_name` = '".$_POST['txtApellido']."'
                        WHERE 
                            `idtbl_users` = ".$_POST['txtId'].";";
        $respuest = mysql_query($sqlUpdate);
        if($respuest){
            ?>
                <script>
                    alert("Edición exitosa");
                    window.close();
                    opener.location.reload(true);
                </script>
            <?php
            exit;
        }
        else{
            ?>
                <script>alert("Ha ocurrido un problema editando el usuario por favor vuelva a intentarlo");</script>
            <?php
            exit;
        }
    }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/styleCerulean.css">
        <script type="text/javascript" src="../js/jvfe.js"></script>
        <title>Edición de usuarios</title>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand text-center" href="#">PaygoTest</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form class="form-horizontal" method="post" onsubmit="return respuestForm();">
                        <table class="">
                            <input type="hidden" id="txtId" name="txtId" value="<?php echo $_GET['id']; ?>">
                            <tr>
                                <td>
                                    Nombre:
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="txtNombre" name="txtNombre" value="<?php if($_GET['name']!=""){ echo $_GET['name']; } else{ echo $_POST['txtNombre']; }?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Apellido:
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="txtApellido" name="txtApellido" value="<?php if($_GET['lastName']!=""){ echo $_GET['lastName']; }else{ echo $_POST['txtApellido']; }?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-primary" onclick="validateForm();">Guardar</button>
                                </td>
                            </tr>
                            <input type="hidden" id="hidVal" name="hidVal" value="0">
                        </table>
                </form>
                </div>
            </div>
        </div>
    </body>
</html>
