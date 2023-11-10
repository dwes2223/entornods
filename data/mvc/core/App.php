<?php
  namespace Core;

   // Esta clase provee de enrutameiento entre los diferentes controladores  
   /* Forma de acceder a los recursos: http://mvc.local/controlador/metodo/argumento1/argumento2
        eje: http://mvc.local/user/index   ; eje: http://mvc.local/user/show/1
   */
   /* Por defecto: 
          - Si no encontramos controlador -> home
          si no encontramos el metodo  -> index.
    El fichero físico del controlador ser $1 . "Controller" -> UserController , LoginController ...

    Usuario teclea http://mvc.local/user/show  
    Por debajo el servidor lo transforma a : http://mvc.local/index.php?url=user/show
    Despedazaremos la ruta url=user/show/1
    */

class App{
  
    function __construct(){
    
    (isset($_GET["url"])) ? $url = $_GET["url"] : $url = "home";  //si no controller -> controller = home

    //trocear la url-> $1 = controlador ; $2 = metodo ; $3 = resto de parametros
    $arguments = explode('/',trim($url,'/')); // separa cadena caracter / y lo vuelca a array
    $controllerName = array_shift($arguments); // extrae el primer elmto.
    $controllerName = ucwords($controllerName) . "Controller";

    //Obtengo el metodo de la peticion o si no por defecto es index
    count($arguments) ? $method = array_shift($arguments) : $method = "index"; //por defecto metodo index

    //Verifico que existe el fichero con ese nombre de controlador. Si no error 404
    $file = "../app/controllers/" . $controllerName . ".php"; 
    if(file_exists($file)){
        require_once "$file"; // si existe lo invoco
    }else{
        header("HTTP/1.1 404 Not Found");
        echo "Recurso no encontrado";
        die();
    }

    
    //Invoco al controlador , metodo y argumentos obtenidos.
    
    // IMPORTANTE ! Al meter los namespaces  la linea de abajo no funciona !!!
    //La solucion es la siguiente linea
    $controllerName = '\\App\\Controllers\\' . $controllerName;
    
    $controllerObject = new $controllerName;  

      //verifico si realmente existe el metodo de la peticion en el controlador.
    if(method_exists($controllerName,$method)){            
        $controllerObject->$method($arguments); //invoco al metodo del controlador con los param restantes
    }else{
        header("HTTP/1.1 404 Not Found");
        echo "Funcion no encontrada";
        die();
    }

  }//fin_construct

}//fin_class
