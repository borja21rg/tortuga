<?php
 require_once ("./classGrafico.php");
class Punto extends Grafico
{ //Hereda de gráfico, o qué.
    private int $x;
    private int $y;

    public function getX()
    {
        return $this->x;
    }

    public function setX($x)
    {
        $this->x = $x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function dibujar()
    {
        return ""; //¿Aquí no recibe nada, no?
    }

    public function mover($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function desplazar($dx, $dy)
    {
        $this->x += $dx;
        $this->y += $dy;
    }

    //Pensar si crear otra clase intermedia entre grafico y linea que tenga lo siguiente
    public function insertarPunto(Punto $p)
    {
        $this->vertices[] = $p;
        $this->numeroVertices++;
    }
    public function getVertice($n)
    {
        $p = null;
        if (count($this->vertices) > $n) {
            $p = $this->vertices[$n];
        }
        return $p;
    }
}

