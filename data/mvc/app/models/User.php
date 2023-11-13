<?php
  namespace App\Models;

  require "../core/Model.php";

  use Core\Model;

  /* No es necesario definir atributos.
     PHP permite definirlos durante la ejecucion.
  */
  class User extends Model
  {
    public static function all(){
        //Recuperar todos
        echo "<br>Recuperando todos los usuarios";
    }
    public static function find($id){
        //Recuperar uno especifico
        echo "<br>Recuperando 1 usuario con id: $id";
    }
    public function insert(){
        //Insertar NUEVO usuario
    }
    public function delete(){
        //Borrar un usuario en particular
    }
    public function save() {
        // Actualizar usuario EXSISTENTE
    }
  }//final_clase
  