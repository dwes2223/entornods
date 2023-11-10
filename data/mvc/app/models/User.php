<?php
  namespace App\Models;

  class User{

    //Array multidimensional con los datos del usuario
    const USERS = [
        array(1,"Juan"),
        array(2,"Ana"),
        array(3,"Fernando"),
        array(4,"Maria")        
    ];

    //funcion devuelve todos los datos
    public static function all(){
        return User::USERS;
    }//all

    //funcion devuvelve  uno en particular
    public static function find($id){
        return User::USERS[$id-1]; //los usuarios empiezan en 1 , pero el array en 0
        
        /*   Otra forma de recuperar los usuarios: usuario = [1,Juan]
        foreach(User::USERS as $clave => $usuario){ 
            if ($usuario[0] == $id) {
                return $usuario;
            }       
        }//foreach
        */
    }//find
  }//fin_clase