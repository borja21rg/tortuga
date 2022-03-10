<?php
 require_once ("./classGrafico.php");
 require_once ("./classPunto.php");

class Linea extends Grafico
{ //Aquí tendo dudas también, pero viendo el diagrama creo que hereda de Punto.
    private Punto $centro;

    public function __construct($x1, $x2, $y1, $y2)
    {
        $p = new Punto($x1, $y1);
        $p->mover($x1, $y1);
        $this->centro->insertarPunto($p);
        $p2 = new Punto($x2, $y2);
        $p2->mover($x2, $y2);
        $this->centro->insertarPunto($p2);
    }

    public function dibujar()
    {
        return "<line x1='" . $this->centro->getVertice(0)->getX() . "' y1='" . $this->centro->getVertice(0)->getY() . "' x2='". $this->centro->getVertice(1)->getX()."' y2='".$this->centro->getVertice(1)->getY()."' style='stroke:#f00; stroke-width:15; stroke-linecap: butt'></line>";
    }
}
