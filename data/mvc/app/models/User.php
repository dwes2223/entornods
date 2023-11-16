<?php
  namespace App\Models;

  require "../core/Model.php";

  use Core\Model;

  use PDO; //Añadido en mvc04 . necesario para conexion bbdd

  use DateTime; //Añadido mvc04 v2 despues de Read


  /* No es necesario definir atributos.     PHP permite definirlos durante la ejecucion.
      - Extiende  de la clase Model que devuelve un conexion a la base de datos.
  */

   /* La siguiente linea es necesaira porque en php 8.2 sale el siguiente error
     Deprecated: Creation of dynamic property App\Models\User::$id is deprecated in 
     /var/www/html/app/models/User.php on line 25.

     https://php.watch/versions/8.2/dynamic-properties-deprecated
     https://wiki.php.net/rfc/deprecate_dynamic_properties
     https://www.php.net/manual/en/migration82.deprecated.php

   */
 
  class User extends Model
  {

    //añadido en mvc04 v2 despues de READ
    public function __construct(){                    
      
      /* Esta linea se necesita porque desde la version 8 de php no se puede
         utilizar DateTimme::createFromFormta con el segund valor a nulo.
         En el index funciona porque fetch te crea los parametros automaticamente.
         Pero en el metodo store se crea un objeto del constructor por defecto con las propiedades a null,
         y es ahi donde falla.
      */
      $this->birthdate = isset($this->birthdate) ? $this->birthdate : " " ;      
      $this->birthdate = DateTime::createFromFormat('Y-m-d', $this->birthdate);
      
        
    }
    public static function all(){
        //Recuperar todos
        //echo "<br>Recuperando todos los usuarios";
        //Añadido en rama mvc04
        $dbh = User::db(); //hereda el metodo db de Model implicitamente. Tb funciona con self
        $sql = "SELECT * FROM users";        
        $statement = $dbh->query($sql);        
        $users = $statement->fetchAll(PDO::FETCH_CLASS,User::class);   
        return $users; //devuelve todas las filas de usuario.


    }
    public static function find($id){
        //Recuperar uno especifico
        //echo "<br>Recuperando 1 usuario con id: $id";
        $dbh = self::db();
        $sql = "SELECT * FROM users where id = :id";
        $statement = $dbh->prepare($sql);
        $statement->bindParam(":id",$id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS,User::class); //guardo los campos como attr de la clse
        $user = $statement->fetch(PDO::FETCH_CLASS); //recupero un unico registro
        return $user;

    }
    
    //Insertar NUEVO usuario
    public function insert(){
      $dbh = User::db();
      $sql = "INSERT INTO users(name,surname,email,birthdate) VALUES(:name,:surname,:email,:birthdate)";    
      $statement = $dbh->prepare($sql);
      $statement->bindValue(":name",$this->name);
      $statement->bindValue(":surname",$this->surname);
      $statement->bindValue(":email",$this->email);         
      $statement->bindValue(":birthdate",$this->birthdate); 
      return $statement->execute();
    }

    public function delete(){
        //Borrar un usuario en particular
    }
    public function save() {
        // Actualizar usuario EXSISTENTE
    }
  }//final_clase
  