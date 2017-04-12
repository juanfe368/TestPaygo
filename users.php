<?php
    $ruta = dirname(__FILE__).'/php/';
    include_once $ruta.'ImportFile.php';
    $users = new ImportFile();
    $respuestUsers = $users->getUsers($ruta);
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
        <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/styleCerulean.css">
        <!-- Style de plugin de paginación-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
        <script type="text/javascript" src="js/jvf.js"></script>
        <title>Sistema de Importación de Archivos CSV</title>
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
                <h2 class="text-center">Administración de Usuarios</h2>
            </div>
            <div class="row">
                <!--<form enctype="multipart/form-data" class="form-horizontal" method="POST" onsubmit="" action="">-->
                    <table id="tblData" name="tblData" class="table">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Nombre
                                </th>
                                <th>
                                    Apellido
                                </th>
                                <th>Edición</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while ($row = mysql_fetch_array($respuestUsers)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row['idtbl_users'] ?></td>
                                            <td><?php echo $row['txt_first_name'] ?></td>
                                            <td><?php echo $row['txt_last_name'] ?></td>
                                            <td>
                                                <a href="php/UserEdit.php?id=<?php echo $row['idtbl_users']; ?>&name=<?php echo $row['txt_first_name'] ?>&lastName=<?php echo $row['txt_last_name'] ?>" type="button" class="btn btn-info" target="_blank">Editar</a>
                                                <a href="php/ProcessEliminar.php?id=<?php echo $row['idtbl_users']; ?>" class="btn btn-info" target="_blank">Eliminar</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                <!--</form>-->
            </div>
        </div>
        <script>
                $(document).ready(function() {
                    $('#tblData').DataTable();
                } );
                function eliminar(idReg){
                    //alert("Este es el id del registro a eliminar: "+idReg);
                    document.location.target = "_blank";
                    document.location.href = "php/ProcessEliminar.php?id="+idReg;
                }
                
                function editar(idReg){
                    //alert("Este es el id del registro a editar: "+idReg);
                    document.location.href = "php/ProcessEditar.php?id="+idReg;
                }
                
        </script>
    </body>
</html>
