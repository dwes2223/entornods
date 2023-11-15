<?php

namespace App\Controllers;

//añadida en rama mvc04 para utilizar la clase User
use App\Models\User;

//echo getcwd(); //para mostrar el directorio que esta cargando
require_once "../app/models/User.php";

class UserController 
{
    function __construct(){
        //echo "<br> Comenzando USER controller..";
    }
    
    public function index(){
        //IMPORTANTE: Al meter los namespaces la linea va 
        $users = User::all(); //llama al modelo
        require "../app/views/user/index.php";  //invoca a la vista
    }//index

    // Debe recuperar solo el usuario con el id indicado en la solicitud de la url
    public function show($argumentos){        
        //$id = $_GET["id"];             
        $id = (int)$argumentos[0];        
        $user = User::find($id);                
        require "../app/views/user/show.php";
    }//show
    
}//fin class
