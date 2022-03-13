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
    public function setAngulo($angulo){
        $this->angulo += $angulo;
    }
    public function getAngulo(){
        return $this->angulo;
    }
    public function resetAngulo(){
        $this->angulo = 0;
    }
    public function dibujar() : string {
        $cad="";
        //if($this->getPintar()) {
           $cad='<image xlink:href="./img/tortuga.png" x="'.($this->getCentro()->getX()-15).'" y="'.($this->getCentro()->getY()-15).'" width=30 height=30 transform= "rotate('.$this->getAngulo().', '.($this->getCentro()->getX()).', '.($this->getCentro()->getY()).')" opacity="'.$this->getVisible().'"/>';
        //}

        return $cad;
    }

    public function animar($d) {
/* Llamamos al método desplazar pasándola los parámetros de discreción por la velocidad */
        $this->centro->desplazar($d*sin($this->angulo*pi()/180), -$d*cos($this->angulo*pi()/180));

    }

    public function guardar($x1, $y1) :void {
        // require_once("./conectarBBDD.php");
        //$this->db=Conectar::conexion();
        try {
            // require("./configConexionBBDD.php");
            $dsn = 'mysql:dbname=bdLogo;host=db';
            $usuario = 'alumnado';
            $clave = 'alumnado';

            $bd=new PDO($dsn, $usuario, $clave);
            $bd->exec("set character set utf8");
            $resultado=$bd->prepare("insert into linea (x1, y1, x2, y2) 
            values (?, ?, ?, ?);");
    
            $resultado->execute(array(
                $x1,
                $y1,
                $this->getCentro()->getX(),
                $this->getCentro()->getY(),
            ));
    
           
        } catch (PDOException $e) {
            print "    <p>Error: No puede conectarse con la base de datos.</p>\n";
            print "    <p>Error: " . $e->getMessage() . "</p>\n";
            exit();
        }
    }

    public function dibujarLinea() :void {
        // require_once("./conectarBBDD.php");
        //$this->db=Conectar::conexion();
        try {
            // require("./configConexionBBDD.php");
            $dsn = 'mysql:dbname=bdLogo;host=db';
            $usuario = 'alumnado';
            $clave = 'alumnado';

            $bd=new PDO($dsn, $usuario, $clave);
            $bd->exec("set character set utf8");
            $resultado=$bd->query("select * from linea")->fetchAll();

            foreach ($resultado as $item) {
               //$this->circulos[]=$item;
               echo "\n<line x1='".$item['x1']."' y1='".$item['y1']."' x2='".$item['x2']."' y2='".$item['y2']."' style='stroke:black; stroke-width:3; stroke-linecap: butt'></line>";
            }

            // return $this->circulos;
    
           
        } catch (PDOException $e) {
            print "    <p>Error: No puede conectarse con la base de datos.</p>\n";
            print "    <p>Error: " . $e->getMessage() . "</p>\n";
            exit();
        }
    }
}
