<?php
  
  require_once "User.php";

  class Controller
  {
    //Debe recuperar todos los elmtos para enviarlos a la vista
    public function index(){
        $users = User::all(); //llama al modelo
        require "views/index.php";  //invoca a la vista
    }//index

    // Debe recuperar solo el usuario con el id indicado en la solicitud de la url
    public function show(){
        $id = $_GET["id"];
        $user = User::find($id);        
        require "views/show.php";
    }//show
    
  }//fin_clase
  