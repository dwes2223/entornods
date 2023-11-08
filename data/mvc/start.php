<?php

/*  Para probar la recuperacion de datos del modelo
     require "User.php";     
     $arrusers =  User::all();
     print_r($arrusers);
     print_r(User::find(3)); //Recupero el usuario con id=3
*/

require_once "Controller.php";

$app = new Controller();

if(isset($_GET['method'])) {
    $method = $_GET['method'];
} else {
    $method = 'index';
}

try {
    if(method_exists($app, $method)) {
        $app->$method();
    } else {
        throw new Exception("No encontrado");
    }
} catch (\Throwable $th) {
    http_response_code(404);
    echo $th->message;
}