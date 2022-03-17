<?php
spl_autoload_register("cargaClases");

/* Función para llamar a todas las clases */
function cargaClases($nombreClase)
{
  require_once "./Clases/" . $nombreClase . '.php';
}

//Iniciamos una sesión. En caso de NO existir, muestra la página en blanco.
session_start();

if (!isset($_SESSION['activa'])) {
  echo " ";
  //Si existe y la sesion tiene el perfil Profesor iniciara sesion como administrador
} elseif ($_SESSION['perfil'] == "Profesor") {

  /* Introducir las cosas que puede editar el profesor */

  // VARIABLES SESIÓN
  if (!isset($_SESSION['arrayfiguras'])) {
    $arrayfiguras = new AppWebLogo();
    $_SESSION['arrayfiguras'] = $arrayfiguras;
    $tortuga = new Tortuga(400, 250, 0);
    //$tortuga->guardar(400,250);
    $arrayfiguras->aniadir($tortuga);
  } else {
    $arrayfiguras = $_SESSION['arrayfiguras'];
  }

  if (!isset($_SESSION['array'])) {
    $array = [];
    $_SESSION['array'] = $array;
  } else {
    $array = $_SESSION['array'];
  }

  if (!isset($_SESSION['comando'])) {
    $arrayComandos = [];
    $_SESSION['comando'] = $arrayComandos;
  } else {
    $arrayComandos = $_SESSION['comando'];
  }

  //COMANDOS
  foreach ($arrayfiguras->getArray() as $elemento) {

    $x = $elemento->getCentro()->getX();
    $y = $elemento->getCentro()->getY();
    $_SESSION['array'] = [$x, $y];
  }

  if (isset($_POST['comandos'])) {
    $input = $_POST['comandos'];
    $comandos = explode(" ", $input);


    foreach ($arrayfiguras->getArray() as $elemento) {

      for ($i = 0; $i < count($comandos); $i++) {
        if ($comandos[$i] == "adelante" || $comandos[$i] == "ad") {
          if (is_numeric($comandos[($i + 1)])) {
            $elemento->animar(($comandos[($i + 1)]));
            $elemento->guardar($elemento->getCentro()->getx(), $elemento->getCentro()->getY());
          }
        } elseif ($comandos[$i] == "atras" || $comandos[$i] == "at") {
          if (is_numeric($comandos[($i + 1)])) {
            $elemento->animar((-$comandos[($i + 1)]));
            $elemento->guardar($elemento->getCentro()->getx(), $elemento->getCentro()->getY());
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
          try {
            $dsn = 'mysql:dbname=bdLogo;host=db';
            $usuario = 'alumnado';
            $clave = 'alumnado';

            $bd = new PDO($dsn, $usuario, $clave);
            $bd->exec("set character set utf8");
            $resultado = $bd->query("delete from linea");
            $bd->query("insert into linea (x1, y1, x2, y2, pintar) values (400, 250, 400, 250, 1);");

            $bd->query("delete from puntos");
          } catch (PDOException $e) {
            print "    <p>Error: No puede conectarse con la base de datos.</p>\n";
            print "    <p>Error: " . $e->getMessage() . "</p>\n";
            exit();
          }
          $elemento->mover(400, 250);
          $elemento->resetAngulo();
        } elseif ($comandos[$i] == "subirlapiz" || $comandos[$i] == "sl") {
          $elemento->setPintar(false);
        } elseif ($comandos[$i] == "bajarlapiz" || $comandos[$i] == "bl") {
          $elemento->setPintar(true);
        } elseif ($comandos[$i] == "ocultartortuga" || $comandos[$i] == "ot") {
          $elemento->setVisible(false);
        } elseif ($comandos[$i] == "mostrartortuga" || $comandos[$i] == "mt") {
          $elemento->setVisible(true);
        } elseif ($comandos[$i] == "casa") {
          $elemento->mover(400, 250);
          $elemento->resetAngulo();

        } elseif ($comandos[$i] == "repetir" || $comandos[$i] == "rep") {
          if (is_numeric($comandos[($i + 1)])) {
            $n = ($i + 1);
            //echo ($n);
            if (($comandos[($i + 2)]) == "[") {
              $inicio = array_search("[", ($comandos));
              $fin = array_search("]", ($comandos));

              for ($i = 0; $i <= $n; $i++) {

                for ($e = $inicio + 1; $e < $fin; $e++) {

                  if ($comandos[$e] == "adelante" || $comandos[$e] == "ad") {
                    if (is_numeric($comandos[($e + 1)])) {
                      $elemento->animar(($comandos[($e + 1)]));
                      $elemento->guardar($elemento->getCentro()->getx(), $elemento->getCentro()->getY());
                    }
                  } elseif ($comandos[$e] == "atras" || $comandos[$e] == "at") {
                    if (is_numeric($comandos[($e + 1)])) {
                      $elemento->animar((-$comandos[($e + 1)]));
                      $elemento->guardar($elemento->getCentro()->getx(), $elemento->getCentro()->getY());
                    }
                  } elseif ($comandos[$e] == "derecha" || $comandos[$e] == "de") {
                    if (is_numeric($comandos[($e + 1)])) {
                      $elemento->setAngulo($comandos[($e + 1)]);
                    }
                  } elseif ($comandos[$e] == "izquierda" || $comandos[$e] == "iz") {
                    if (is_numeric($comandos[($e + 1)])) {
                      $elemento->setAngulo(- ($comandos[($e + 1)]));
                    }
                  } elseif ($comandos[$e] == "borrarpantalla" || $comandos[$e] == "bp") {
                    try {
                      $dsn = 'mysql:dbname=bdLogo;host=db';
                      $usuario = 'alumnado';
                      $clave = 'alumnado';

                      $bd = new PDO($dsn, $usuario, $clave);
                      $bd->exec("set character set utf8");
                      $resultado = $bd->query("delete from linea");
                      $bd->query("insert into linea (x1, y1, x2, y2) values (400, 250, 400, 250);");

                      $bd->query("delete from puntos");
                    } catch (PDOException $e) {
                      print "    <p>Error: No puede conectarse con la base de datos.</p>\n";
                      print "    <p>Error: " . $e->getMessage() . "</p>\n";
                      exit();
                    }
                    $elemento->mover(400, 250);
                    $elemento->resetAngulo();
                  } elseif ($comandos[$e] == "subirlapiz" || $comandos[$e] == "sl") {
                    $elemento->setPintar(false);
                  } elseif ($comandos[$e] == "bajarlapiz" || $comandos[$e] == "bl") {
                    $elemento->setPintar(true);
                  } elseif ($comandos[$e] == "ocultartortuga" || $comandos[$e] == "ot") {
                    $elemento->setVisible(false);
                  } elseif ($comandos[$e] == "mostrartortuga" || $comandos[$e] == "mt") {
                    $elemento->setVisible(true);
                  } elseif ($comandos[$e] == "casa") {
                    $elemento->mover(400, 250);
                    $elemento->resetAngulo();
                  }
                }
              }
            }
          }
        }
      }
    }
  }

  /* print_r($_SESSION['array']); */
  include "./librerias/libreriamain1.php";
  cabecera("Logo", "Aprende a usar LOGO");

  foreach ($arrayfiguras->getArray() as $elemento) {

/*     $elemento->guardar($_SESSION['array'][0], $_SESSION['array'][1]); Nos da error */
    $elemento->dibujarLinea();
    echo $elemento->dibujar();
  }

  include "./librerias/libreriamain2P.php";
} elseif ($_SESSION['perfil'] == "Alumno") {


   // VARIABLES SESIÓN
   if (!isset($_SESSION['arrayfiguras'])) {
    $arrayfiguras = new AppWebLogo();
    $_SESSION['arrayfiguras'] = $arrayfiguras;
    $tortuga = new Tortuga(400, 250, 0);
    //$tortuga->guardar(400,250);
    $arrayfiguras->aniadir($tortuga);
  } else {
    $arrayfiguras = $_SESSION['arrayfiguras'];
  }

  if (!isset($_SESSION['array'])) {
    $array = [];
    $_SESSION['array'] = $array;
  } else {
    $array = $_SESSION['array'];
  }

  if (!isset($_SESSION['comando'])) {
    $arrayComandos = [];
    $_SESSION['comando'] = $arrayComandos;
  } else {
    $arrayComandos = $_SESSION['comando'];
  }

  //COMANDOS
  foreach ($arrayfiguras->getArray() as $elemento) {

    $x = $elemento->getCentro()->getX();
    $y = $elemento->getCentro()->getY();
    $_SESSION['array'] = [$x, $y];
  }

  if (isset($_POST['comandos'])) {
    $input = $_POST['comandos'];
    $comandos = explode(" ", $input);


    foreach ($arrayfiguras->getArray() as $elemento) {

      for ($i = 0; $i < count($comandos); $i++) {
        if ($comandos[$i] == "adelante" || $comandos[$i] == "ad") {
          if (is_numeric($comandos[($i + 1)])) {
            $elemento->animar(($comandos[($i + 1)]));
            $elemento->guardar($elemento->getCentro()->getx(), $elemento->getCentro()->getY());
          }
        } elseif ($comandos[$i] == "atras" || $comandos[$i] == "at") {
          if (is_numeric($comandos[($i + 1)])) {
            $elemento->animar((-$comandos[($i + 1)]));
            $elemento->guardar($elemento->getCentro()->getx(), $elemento->getCentro()->getY());
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
          try {
            $dsn = 'mysql:dbname=bdLogo;host=db';
            $usuario = 'alumnado';
            $clave = 'alumnado';

            $bd = new PDO($dsn, $usuario, $clave);
            $bd->exec("set character set utf8");
            $resultado = $bd->query("delete from linea");
            $bd->query("insert into linea (x1, y1, x2, y2, pintar) values (400, 250, 400, 250, 1);");

            $bd->query("delete from puntos");
          } catch (PDOException $e) {
            print "    <p>Error: No puede conectarse con la base de datos.</p>\n";
            print "    <p>Error: " . $e->getMessage() . "</p>\n";
            exit();
          }
          $elemento->mover(400, 250);
          $elemento->resetAngulo();
        } elseif ($comandos[$i] == "subirlapiz" || $comandos[$i] == "sl") {
          $elemento->setPintar(false);
        } elseif ($comandos[$i] == "bajarlapiz" || $comandos[$i] == "bl") {
          $elemento->setPintar(true);
        } elseif ($comandos[$i] == "ocultartortuga" || $comandos[$i] == "ot") {
          $elemento->setVisible(false);
        } elseif ($comandos[$i] == "mostrartortuga" || $comandos[$i] == "mt") {
          $elemento->setVisible(true);
        } elseif ($comandos[$i] == "casa") {
          $elemento->mover(400, 250);
          $elemento->resetAngulo();

        } elseif ($comandos[$i] == "repetir" || $comandos[$i] == "rep") {
          if (is_numeric($comandos[($i + 1)])) {
            $n = ($i + 1);
            //echo ($n);
            if (($comandos[($i + 2)]) == "[") {
              $inicio = array_search("[", ($comandos));
              $fin = array_search("]", ($comandos));

              for ($i = 0; $i <= $n; $i++) {

                for ($e = $inicio + 1; $e < $fin; $e++) {

                  if ($comandos[$e] == "adelante" || $comandos[$e] == "ad") {
                    if (is_numeric($comandos[($e + 1)])) {
                      $elemento->animar(($comandos[($e + 1)]));
                      $elemento->guardar($elemento->getCentro()->getx(), $elemento->getCentro()->getY());
                    }
                  } elseif ($comandos[$e] == "atras" || $comandos[$e] == "at") {
                    if (is_numeric($comandos[($e + 1)])) {
                      $elemento->animar((-$comandos[($e + 1)]));
                      $elemento->guardar($elemento->getCentro()->getx(), $elemento->getCentro()->getY());
                    }
                  } elseif ($comandos[$e] == "derecha" || $comandos[$e] == "de") {
                    if (is_numeric($comandos[($e + 1)])) {
                      $elemento->setAngulo($comandos[($e + 1)]);
                    }
                  } elseif ($comandos[$e] == "izquierda" || $comandos[$e] == "iz") {
                    if (is_numeric($comandos[($e + 1)])) {
                      $elemento->setAngulo(- ($comandos[($e + 1)]));
                    }
                  } elseif ($comandos[$e] == "borrarpantalla" || $comandos[$e] == "bp") {
                    try {
                      $dsn = 'mysql:dbname=bdLogo;host=db';
                      $usuario = 'alumnado';
                      $clave = 'alumnado';

                      $bd = new PDO($dsn, $usuario, $clave);
                      $bd->exec("set character set utf8");
                      $resultado = $bd->query("delete from linea");
                      $bd->query("insert into linea (x1, y1, x2, y2) values (400, 250, 400, 250);");

                      $bd->query("delete from puntos");
                    } catch (PDOException $e) {
                      print "    <p>Error: No puede conectarse con la base de datos.</p>\n";
                      print "    <p>Error: " . $e->getMessage() . "</p>\n";
                      exit();
                    }
                    $elemento->mover(400, 250);
                    $elemento->resetAngulo();
                  } elseif ($comandos[$e] == "subirlapiz" || $comandos[$e] == "sl") {
                    $elemento->setPintar(false);
                  } elseif ($comandos[$e] == "bajarlapiz" || $comandos[$e] == "bl") {
                    $elemento->setPintar(true);
                  } elseif ($comandos[$e] == "ocultartortuga" || $comandos[$e] == "ot") {
                    $elemento->setVisible(false);
                  } elseif ($comandos[$e] == "mostrartortuga" || $comandos[$e] == "mt") {
                    $elemento->setVisible(true);
                  } elseif ($comandos[$e] == "casa") {
                    $elemento->mover(400, 250);
                    $elemento->resetAngulo();
                  }
                }
              }
            }
          }
        }
      }
    }
  }

  /* print_r($_SESSION['array']); */
  include "./librerias/libreriamain1.php";
  cabecera("Logo", "Aprende a usar LOGO");

  foreach ($arrayfiguras->getArray() as $elemento) {

/*     $elemento->guardar($_SESSION['array'][0], $_SESSION['array'][1]); Nos da error */
    $elemento->dibujarLinea();
    echo $elemento->dibujar();
  }
  include "./librerias/libreriamain2.php";
}
