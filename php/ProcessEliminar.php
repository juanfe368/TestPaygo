<?php
$idEliminar = $_GET['id'];

include_once './DataBase.php';
$conexion = new DataBase();
$conexion->connectDataBase();

$sqlDelete = "DELETE FROM `tbl_users`
                WHERE 
                    `idtbl_users` = $idEliminar;";

$respuestDelete = mysql_query($sqlDelete);

if($respuestDelete){
    echo '<script>alert("Registro eliminado exitosamente");</script>';
    echo '<script>opener.location.reload(true);</script>';
    echo '<script>window.close();</script>';
    exit;
}
else{
    echo '<script>alert("No se pudo eliminar el registro por favor intentelo nuevamente");</script>';
    echo '<script>window.close();</script>';
    exit;
}

