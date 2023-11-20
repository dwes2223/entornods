<?php

namespace App\Controllers;

//añadida en rama mvc04 para utilizar la clase User
use App\Models\User;

//echo getcwd(); //para mostrar el directorio que esta cargando
//require_once "../app/models/User.php"; // Comentado en rama mvc06 !!

use Dompdf\Dompdf; //Añadido mvc06 para crear un pdf

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

    // Funcion que genera un pdf a partir de html o PHP
    // Añadido en rama mvc06
    // ATENCION: Ejecutar antes los siguientes comandos:
   //  sudo apt install php-xml   ; composer require dompdf/dompdf
    public function pdf(){
        ob_start(); //creamo buffer para almacenar salida php 
        $this->index(); //generamos los datos
        $html = ob_get_clean(); //el contenido del buffer lo guardamos en $html
        $dompdf = new Dompdf();        
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait'); //tambien en ladscape
        $dompdf->render(); 
        $dompdf->stream("listausuarios.pdf",array("Attachment" => 0));  
      }

    
}//fin class
