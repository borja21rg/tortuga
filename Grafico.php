<?php
    class Grafico {
        protected $visible;
        
        public function mostrar() {
            $this ->visible = true;
        }

        public function mostrar() {
            $this ->visible = false;
        }

        public function getvisible() {
            return $this -> visible;
        }

        public function dibujar() {}

        public function mover($x, $y) {}

        public function desplazar($x, $y) {}
    }

?>