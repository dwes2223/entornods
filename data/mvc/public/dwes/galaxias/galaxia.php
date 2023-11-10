<?php
  namespace Dwes\Galaxias;
  
 const RADIO =  125.4; //milloones km

 function observar($mensaje){
    echo "<br>Observando la galaxia " . $mensaje;
 }//fin_observar
 
 function time(){
    echo "A la galaxia le quedan 8548948948489 años" ;
}

 class Galaxia
 {
    function __construct(){
        $this->nacimiento();
    }//fin_construct

    function nacimiento(){
        echo "<br>Hola !, soy una nueva Galaxia!";
    }//fin_nacimiento

    static function muerte($nombre){
        echo "<br>Galaxia " . $nombre . "  destruyendose...";
    }//fin_muerte
   
 }
 