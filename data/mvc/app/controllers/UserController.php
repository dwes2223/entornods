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

    //CREATE: Muestra el la vista de alta de nuevo usuario
    public function create(){
        require "../app/views/user/create.php";
    }

    //CREATE: Almacena en la bbdd un nueva fila
    public function store(){
        $user = new User();
        $user->name = $_REQUEST['name'];
        $user->surname = $_REQUEST['surname'];
        $user->birthdate = $_REQUEST['birthdate'];
        $user->email = $_REQUEST['email'];
        $user->insert();     
        header("Location:/user"); //Una vez insertado redirijo al index de user.

    }

    /* UPDATE: Método edit que genera un formulario de modificación con los datos del registro. 
       Este método implica buscar en la base de datos antes de construir el formulario.
    */
    public function edit($argumentos){
        $id = (int)$argumentos[0];
        $user = User::find($id); //busco el usuario para mostrar sus datos
        require "../app/views/user/edit.php"; //muestro en la vista los datos del user seleccionado       
    }//fin_edit

    /* UPDATE : Método update que recibe los datos de dicho formulario. Igualmente, debemos buscar el registro 
       en la base de datos y después modificarlo.
    */
    public function update(){
        $id = $_REQUEST["id"];
        $user = User::find($id); //busco el usuario a actualizar los datos
        $user->name = $_REQUEST["name"];
        $user->surname = $_REQUEST["surname"];
        $user->email = $_REQUEST["email"];
        $user->birthdate = $_REQUEST["birthdate"];
        $user->save();
        header("Location:/user"); //Una vez insertado redirijo al index de user.

    }//fin_update

    /* DELETE: Metodo delete. Recibe el id de usuario a eliminar mediante la URL y lo establece en la propiedad id
        del objeto a eliminar. Previamente debemos buscar si existe el uuario        
    */
    public function delete($argumentos){
        $id = (int)$argumentos[0];
        $user = User::find($id); // que pasa si introduzco un id que no existe? -> da Error       
        $located = $user ? $user->delete() && header("Location:/user")  : 
        "<strong>Usuario no encontrado!</strong><br><a href=\"/user\">Volver</a>";
        echo $located;        
    }//fin_delete

    
}//fin class
