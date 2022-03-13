<?php

class Grafico {
    protected $visible = true;

    public function mostrar() {
        $this ->visible = true;
    }

    public function ocultar() {
        $this ->visible = false;
    }

    public function getvisible() {
        if($this->visible == true){
            return 1;
        }else{
            return 0;
        }
        //return $this->visible;
    }
    public function setvisible($visible) {
        $this->visible = $visible;
    }

    public function dibujar(): string{
        return (" ");
    }
/*     public function animar($x,$y) {

    } */

    public function mover($x, $y) {}

    public function desplazar($x, $y) {}
}

?>