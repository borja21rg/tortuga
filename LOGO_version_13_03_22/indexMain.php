<?php
spl_autoload_register("cargaClases");

/* Función para llamar a todas las clases */
  function cargaClases($nombreClase)
  {
    require_once "./Clases/" . $nombreClase . '.php';
  }

 //Iniciamos una sesión. En caso de NO existir, muestra la página en blanco.
session_start();

// VARIABLES SESIÓN
if (!isset($_SESSION['arrayfiguras'])) {
  $arrayfiguras = new AppWebLogo();
  $_SESSION['arrayfiguras'] = $arrayfiguras;
  $tortuga = new Tortuga(400, 250, 0);
  $arrayfiguras->aniadir($tortuga);
} else {
  $arrayfiguras = $_SESSION['arrayfiguras'];
}

/*Revisar esta variable sesión *Esther
No es necesario que sea de sesión por el momento
pero lo dejo así pq funciona y pensando en un futuro
*/
if(!isset( $_SESSION['array'])) {
  $array=[];
  $_SESSION['array'] = $array;

} else {
  $array=$_SESSION['array'];
}


//Recogemos el valor de coordendas de la tortuga antes de ser modificada
foreach ($arrayfiguras->getArray() as $elemento) {

  $x=$elemento->getCentro()->getX();
  $y=$elemento->getCentro()->getY();
  $_SESSION['array']=[$x, $y];
}

//Comandos
if (isset($_POST['comandos']) && $_POST['comandos']!="") {
  $input = $_POST['comandos'];
  $comandos = explode(" ", $input);

  foreach ($arrayfiguras->getArray() as $elemento) {

      for ($i = 0; $i < count($comandos); $i++) {
        if ($comandos[$i] == "adelante" || $comandos[$i] == "ad") {
          if (is_numeric($comandos[($i + 1)])) {
            $elemento->animar(($comandos[($i + 1)]));
          }
  
        } elseif ($comandos[$i] == "atras" || $comandos[$i] == "at") {
          if (is_numeric($comandos[($i + 1)])) {
            $elemento->animar((-$comandos[($i + 1)]));
          }
  
        } elseif ($comandos[$i] == "derecha" || $comandos[$i] == "de") {
          if (is_numeric($comandos[($i + 1)])) {
            $elemento->setAngulo($comandos[($i + 1)]);
          }
  
        } elseif ($comandos[$i] == "izquierda" || $comandos[$i] == "iz") {
          if (is_numeric($comandos[($i + 1)])) {
            $elemento->setAngulo(- ($comandos[($i + 1)]));
          }
  
        } elseif ($comandos[$i] == "borrarpantalla" || $comandos[$i] == "bp") {
          //¿Aqui ocultamos tambien la tortuga?
          //Y tendriamos tambien que hacer algo parecido a lo que hace el boton de cerrar sesion
          $elemento->mover(180, 180);
          $elemento->resetAngulo();
  
        } elseif ($comandos[$i] == "subirlapiz" || $comandos[$i] == "sl") {
          //
  
        } elseif ($comandos[$i] == "bajarlapiz" || $comandos[$i] == "bl") {
          //
  
        } elseif ($comandos[$i] == "ocultartortuga" || $comandos[$i] == "ot") {
          $elemento->setVisible(false);
  
        } elseif ($comandos[$i] == "mostrartortuga" || $comandos[$i] == "mt") {
          $elemento->setVisible(true);
  
        } elseif ($comandos[$i] == "casa") {
          $elemento->mover(400, 250);
          $elemento->resetAngulo();
  
        } elseif ($comandos[$i] == "repetir" || $comandos[$i] == "rp") {
          if (is_numeric($comandos[($i + 1)])) {
            // Aqui tenemos que filtrar el repeat (numero)[ ]
            // Este comando seria algo asi
            // repeat 4 [ ad 50 de 90 ad 50 ]
          }
        }
      }
    }
}


print_r($_SESSION['array']);

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>LOGO</title>
  <style>
    h2,
    #svg,
    #form {
      text-align: center;
    }
  </style>
</head>

<body>
  <h2>Aprende a usar LOGO</h2>
  <div id="svg">
    <svg width="800" height="500" style="background-color: #e7e7e7">


      <?php
      foreach ($arrayfiguras->getArray() as $elemento) {
        echo $elemento->dibujar();
        $elemento->guardar($_SESSION['array'][0], $_SESSION['array'][1]);
        $elemento->dibujarLinea();
      }
      ?>
      <!-- <line x1=150 y1=500 x2=400 y2=250 stroke="red" stroke-width=2 /> -->

    </svg>
  </div>
  <div id="form">
    <hr>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
      <textarea name="comandos" id="comandos" cols="61" rows="5"></textarea><br>
      <button type="submit" value="Enviar">Enviar</button>
    </form>
    <a href="./cerrrarSesion.php"><button>Cerrar sesión</button></a>
  </div>
</body>

</html>
<?php
echo "<pre>";
print_r($arrayfiguras);
echo "</pre>";

//print_r($arrayfiguras);
