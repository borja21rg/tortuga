<?php
/* Clase Tortuga */

/**
 * @author Mario
 */
class Tortuga extends Grafico
{
    private Punto $centro;
    private int $angulo;
    

    public function __construct($x, $y, $angulo)
    {
        $this->centro = new Punto($x, $y);
        $this->centro->mover($x, $y);
        $this->angulo = $angulo;
    }
    public function getCentro()
    {
        return $this->centro;
    }
    public function setCentro(Punto $p)
    {
        $this->centro = $p;
    }
    public function mover($x, $y)
    {
        $this->centro->mover($x, $y);
    }
    public function desplazar($dx, $dy)
    {
        $this->centro->desplazar($dx, $dy);
    }
    public function setAngulo($angulo)
    {
        $this->angulo += $angulo;
    }
    public function getAngulo()
    {
        return $this->angulo;
    }
    public function resetAngulo()
    {
        $this->angulo = 0;
    }
    
    public function dibujar()
    {

        $cad = "";
        //if($this->getPintar()) {
        $cad = '<image xlink:href="./img/triangulo.png" x="' . ($this->getCentro()->getX() - 15) . '" y="' . ($this->getCentro()->getY() - 15) . '" width=30 height=30 transform= "rotate(' . $this->getAngulo() . ', ' . ($this->getCentro()->getX()) . ', ' . ($this->getCentro()->getY()) . ')" opacity="' . $this->getVisible() . '"/>';
        //}

        return $cad;
    }

    public function animar($d)
    {
        $dx = $d * sin($this->angulo * pi() / 180);
        $dy = $d * cos($this->angulo * pi() / 180);

        if ($this->centro->getX() + $dx < 0 || $this->centro->getX() + $dx > 800 || $this->centro->getY() - $dy < 0 || $this->centro->getY() - $dy > 500) {
            /* Así si se falla te deja la tortuga en el mismo punto en el que estaba.
            Y te muestra el mensaje de que te has salido de los límites.*/
            echo "Te has salido de los límites.";
/*             echo '<script language="javascript">alert("Te has salido de los límites.");</script>'; */
            $dx = 0;
            $dy = 0;

            /* Si queremos que dibuje hasta el límite es más difícil, habría que calcular ángulos y tirar de trigonometría. */
        }


        /* Llamamos al método desplazar pasándola los parámetros de discreción por la velocidad */
        $this->centro->desplazar($dx, -$dy);
    }

    public function guardar($x1, $y1): void
    {
        try {
            $dsn = 'mysql:dbname=bdLogo;host=db';
            $usuario = 'alumnado';
            $clave = 'alumnado';

            $bd = new PDO($dsn, $usuario, $clave);

            //Parte añadida de prueba

            $resul = $bd->query("select * from bdLogo.linea where id = (select max(id) from linea)");
            $resul->rowCount();
            $p = $this->getPintar();
            foreach ($resul as $key) {
                $x = $key['x2'];
                $y = $key['y2'];
            }
            $bd->query("insert into linea (x1, y1, x2, y2, pintar) values ($x, $y, $x1, $y1, $p);");

        } catch (PDOException $e) {
            print "    <p>Error: No puede conectarse con la base de datos.</p>\n";
            print "    <p>Error: " . $e->getMessage() . "</p>\n";
            exit();
        }
    }

    public function dibujarLinea(): void
    {
        try {
            
            $dsn = 'mysql:dbname=bdLogo;host=db';
            $usuario = 'alumnado';
            $clave = 'alumnado';

            $bd = new PDO($dsn, $usuario, $clave);
            $bd->exec("set character set utf8");
            $resultado = $bd->query("select * from linea ");
            $resultado->rowCount();
            foreach ($resultado as $item) {

                echo "\n<line x1='" . $item['x1'] . "' y1='" . $item['y1'] . "' x2='" . $item['x2'] . "' y2='" . $item['y2'] . "' opacity='".$item['pintar']."' style='stroke:black; stroke-width:3; stroke-linecap: butt'></line>";
            }
        } catch (PDOException $e) {
            print "    <p>Error: No puede conectarse con la base de datos.</p>\n";
            print "    <p>Error: " . $e->getMessage() . "</p>\n";
            exit();
        }
    }
}
