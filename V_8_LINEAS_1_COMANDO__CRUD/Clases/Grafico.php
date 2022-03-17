<?php

class Grafico {
    protected $visible = true;
    protected bool $pintar = true;

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
        
    }

    public function getPintar() {
        if($this->pintar == true){
            return 1;
        }else{
            return 0;
        }

    }
    public function setPintar($pintar) {
        $this->pintar = $pintar;
    }
    
    public function setvisible($visible) {
        $this->visible = $visible;
    }

    public function dibujar(){
       
    }

    public function mover($x, $y) {}

    public function desplazar($x, $y) {}
}
