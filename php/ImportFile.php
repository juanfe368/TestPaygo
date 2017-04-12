<?php

/**
 * Description of ImportFile
 *
 * @author juanfe
 */
class ImportFile {
    
    
    /**
     * Construct
     */
    public function ImportFile() {
        
    }
    
    public function importFileCsv(){
        $tipo = $_FILES['inputFile']['type'];
        $tamanio = $_FILES['inputFile']['size'];
        $archivotmp = $_FILES['inputFile']['tmp_name'];
        
        $lineas = file($archivotmp);
        $i = 0;
        $cadenaRespuest = "INSERT INTO tbl_users
                                (`idtbl_users`,
                                `txt_first_name`,
                                `txt_last_name`) 
                            VALUES ";
        foreach ($lineas as $linea_num => $linea)
        { 
           if($i != 0) 
           {
               $datos = explode(",",$linea);
               
               $id = trim($datos[0]);
               $firstName = trim($datos[1]);
               $lastName = trim($datos[2]);

               //guardamos en base de datos la línea leida
               //mysql_query("INSERT INTO datos(nombre,edad,profesion) VALUES('$id','$firstName','$lastName')");
               $cadenaRespuest .= '('.$id.',"'.$firstName.'","'.$lastName.'"),';
           }
           $i++;
        }
        $cadenaClear = trim($cadenaRespuest,',');
        $cadenaClear .= ';';
        
        $respuestInsertCsv = $this->insertUsers($ruta, $cadenaClear);
        
        return $respuestInsertCsv;
    }
    
    
    function insertUsers($ruta, $sqlInser){
        include_once $ruta.'DataBase.php';
        $conexion = new DataBase();
        $conexion->connectDataBase();
        mysql_query('DELETE FROM `tbl_users`');
        $respuestInsert = mysql_query($sqlInser);
        return $respuestInsert;
    }
    
    /**
     * Función que permite obtener a los usuarios
     * @param String $ruta cadena de la ruta raiz del directorio
     * @return mysql_query respuesta de query
     */
    function getUsers($ruta){
        include_once $ruta.'DataBase.php';
        $conexion = new DataBase();
        $conexion->connectDataBase();
        
        $numReg = $_GET['cantReg'];
        $limitSql = "";
        if($numReg!=0){
            $limitSql = "LIMIT $numReg";
        }
        
        $orderUsers = $_GET['order'];
        $orderSql = "";
        if($orderUsers=='asc'){
            $orderSql = " ORDER BY idtbl_users ASC";
        }
        else{
            $orderSql = " ORDER BY idtbl_users DESC";
        }
        
        $selectUsers = "SELECT 
                            `idtbl_users`,
                            `txt_first_name`,
                            `txt_last_name`
                        FROM 
                            `tbl_users`
                            $orderSql
                            $limitSql;";
        $respuestQuery = mysql_query($selectUsers);
        return $respuestQuery;
    }
    
}
