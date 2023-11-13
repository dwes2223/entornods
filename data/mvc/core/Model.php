<?php
 namespace Core;

  /*SEGUNDA APROXIMACION: Refactorizando..*/
  require_once "../config/db.php";
  use const Config\DSN;
  use const Config\USER;
  use const Config\PASSWORD;

  use PDO;
  use PDOException; //necesario para usar PDO

 class Model
 {
    protected static function db(){
        //PRIMERA APROXIMACION: Lo que  esta entre comentarios
        //define(DSN,"mysql:hostname=db;dbname=mvc"); //ojo con const no funciona
        //ver https://www.php.net/manual/es/language.constants.syntax.php
        
      /*  
        $dsn = "mysql:hostname=db;dbname=mvc";
        $usuario = "root";
        $password = "password";
    */
        try {
            $dbh = new PDO(DSN,USER,PASSWORD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            //echo "<br>Conexion ok!!"            
        } catch (PDOException $e) {
            echo "<br>Fallo la conexion: " . $e->getMessage();
        }

        return $dbh;
    }//fin_db
 }//fin-clase
 