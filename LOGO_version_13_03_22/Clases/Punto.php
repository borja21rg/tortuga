<?php

class Punto extends Grafico
{ //Hereda de gráfico, o qué.
    private int $x;
    private int $y;
    protected int $numeroVertices = 0;
    protected Array $vertices = [];

    public function __construct($y, $x) {

        $this->setY($y);
        $this->setX($x);

    }

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

    public function dibujar() :string
    {
        return "";
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
    
    public function getNumeroVertices() : int {
        return $this->numeroVertices;
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
        if ($this->getNumeroVertices()> $n) {
            $p = $this->vertices[$n];
        }
        return $p;
    }
}

