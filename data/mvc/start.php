<?php

/*  Para probar la recuperacion de datos del modelo
     require "User.php";     
     $arrusers =  User::all();
     print_r($arrusers);
     print_r(User::find(3)); //Recupero el usuario con id=3
*/

require "vendor/autoload.php"; // Creado en rama mvc06!!
//require "core/App.php"; // Comentado en rama mvc06!!
$app = new \Core\App();

/*Para probar el acceso al modelo. I
require "core/Model.php";
Core\Model::db();
die();
*/