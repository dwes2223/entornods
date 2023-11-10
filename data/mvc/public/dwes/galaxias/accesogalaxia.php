<?php
  namespace Dwes\Galaxias;

  /* Tipos de Acceso:
        1-Sin cualificar
        2-Cualificado
        3- Totalmente cualificado
     Modos adicionales:
        - Acceso individual con use
        - Apodar Namespaces
  */  
  include "galaxia.php";
  include "galaxiaenana/galaxia.php";
  
  echo "Namespace actual " . __NAMESPACE__; 

  echo "<h3>Acceso sin cualificar</h3>";
  //esta en el mismo namespace(carpeta).No hac falta referencia especial
  observar("Via Lactea");
  $gal1 = new Galaxia();
  echo "<br> Radio de la Galaxia : " . RADIO;
  Galaxia::muerte("Via Lactea");

  echo "<h3>Accesso Cualificado</h3>"; //Relativo a mi ubicación
  
  Galaxiaenana\observar("NGC 1705");
  $gsmall = new Galaxiaenana\Galaxia();
  echo "<br>Radio de la Galaxia: " . Galaxiaenana\RADIO . " millones de km";
  Galaxiaenana\Galaxia::muerte("NGC 1705");

  echo "<h3>Accesso Totalmente Cualificado</h3>"; //absoluto a mi ubicacion.
  \Dwes\Galaxias\Galaxiaenana\observar("NGC 1903");
  $gsmall = new \Dwes\Galaxias\Galaxiaenana\Galaxia();
  echo "<br>Radio de la Galaxia: " . \Dwes\Galaxias\Galaxiaenana\RADIO . " millones de km";
  \Dwes\Galaxias\Galaxiaenana\Galaxia::muerte("NGC 1903");

  echo "<h3>Utilizacion de use</h3>"; //uso varias veces la clase
  use const \Dwes\Galaxias\Galaxiaenana\RADIO;  // con ruta totalmente cualificada

  use const \Dwes\Galaxias\Galaxiaenana\RADIO as RADIOENANA;

  echo "<br> El radio de un galaxia enana es " . RADIOENANA;

  use function \Dwes\Galaxias\Galaxiaenana\observar as mirar;
  mirar("...no se ve hay muchas estrellas");

  echo "<br>Probando NAMESPACE GLOBAL: ";
  echo "<br>Funcion time de la clase : " . time();
  echo "<br>Hora actual: " . \time();


  
  










  