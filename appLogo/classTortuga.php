<?php
 require_once ("./classGrafico.php");
 require_once ("./classPunto.php");
/* Clase Tortuga */

/**
 * @author Mario
 */
class tortuga extends Grafico
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
    public function girar($angulo){
        $this->angulo = $angulo;
    }
    public function getAngulo(){
        return $this->angulo;
    }
}
