<?php

  echo "<h1>Manejo fechas</h1>";

  $cadena = '12/10/2023';
 //$cadena = "2023/12/10";

  $fecha = DateTime::createFromFormat('d/m/Y',$cadena);
  echo "<br> Soy un objeto : " . gettype($fecha);
  echo "<br>";

  var_dump($fecha);

 $sfecha = $fecha->format('#Y#m#d');
  echo "<br>Soy una cadena: ";
  var_dump($sfecha);


  