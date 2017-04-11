<?php

    if($_POST['hidVal']==1){
        echo 'Entro al post';
        var_dump($_POST);
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
        <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/styleCerulean.css">
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
                <form enctype="multipart/form-data" class="form-horizontal" method="POST" onsubmit="return respuestForm();" action="">
                    <fieldset>
                    <legend class="text-center">Importación de archivo CSV</legend>
                      <div class="form-group">
                        <label for="inputFile" class="col-lg-4 control-label text-left">Escoger Archivo CSV</label>
                        <div class="col-lg-6">
                            <input type="file" class="form-control" id="inputFile" name="inputFile" onchange="control(this)">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword" class="col-lg-4 control-label text-left">Cantidad de registros a visualizar</label>
                        <div class="col-lg-6">
                            <input type="number" class="form-control" id="inputNumberRegistros" name="inputNumberRegistros" placeholder="Cantidad de Registros a Visualizar">
                        </div>
                      </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-4 control-label text-left">Orden</label>
                        <div class="col-lg-6">
                            <input type="radio" class="form-control" id="inputRadOrdernAsc" name="inputRadOrdernAsc">Ascendente
                            <input type="radio" class="form-control" id="inputRadOrdernDsc" name="inputRadOrdernDsc">Descendente
                        </div>
                    </div>
                      <div class="form-group">
                        <div class="col-lg-6 col-lg-offset-4 text-right">
                          <button type="reset" class="btn btn-default">Cancel</button>
                          <button type="submit" value="Aceptar" class="btn btn-primary" onclick="validateForm();">Aceptar</button>
                        </div>
                      </div>
                    </fieldset>
                    <input type="hidden" id="hidVal" name="hidVal" value="0">
                </form>
            </div>
        </div>
    </body>
</html>
