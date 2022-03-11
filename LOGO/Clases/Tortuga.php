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
           $cad='<image xlink:href="./img/tortuga.png" x="'.$this->getCentro()->getX().'" y="'.$this->getCentro()->getY().'" width=30 height=30 transform= "rotate('.$this->getAngulo().', '.($this->getCentro()->getX()+15).', '.($this->getCentro()->getY()+15).')" opacity="'.$this->getVisible().'"/>';
        //}

        return $cad;
    }

    public function animar($x, $y) {

        /* Intento calcular los limites para que no se valla del svg por completo : no lo consigo  */

/*         if ($this->getCentro()->getX() + $this->getRadio() > $this->getLimiteX()) {
            $this->direccionX *= -1;
            $this->desplazar(-($this->getCentro()->getX() + $this->getRadio() - $this->getLimiteX())  , 0);
        }

        if ($this->getCentro()->getX() - $this->getRadio()  < 0){
            $this->direccionX *= -1;
        }

        if ($this->getCentro()->getY() + $this->getRadio()  > $this->getLimiteY()){
            $this->direccionY *= -1;
        }

        if ($this->getCentro()->getY() - $this->getRadio()  < 0) {
            $this->direccionY *= -1;
        } */


/* Llamamos al método desplazar pasándola los parámetros de discreción por la velocidad */
$this->centro->desplazar($x, $y);


    }
}
