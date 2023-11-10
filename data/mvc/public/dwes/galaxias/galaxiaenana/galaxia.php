<?php
namespace Dwes\Galaxias\Galaxiaenana;

 const RADIO =  35; //milloones km

 function observar($mensaje){
    echo "<br>Mirando hacia la galaxia: " . $mensaje;
 }//fin_observar

 class Galaxia
 {
    function __construct(){
        $this->nacimiento();
    }//fin_construct

    function nacimiento(){
        echo "<br>Naciendo una nueva galaxia.....";
    }//fin_nacimiento

    static function muerte($nombre){
        echo "<br>$nombre Galaxia estoy llegando a mi fin";
    }//fin_muerte

   
 }
 