<?php

/* Clase AppWebLogo */

/**
 * @author Alfredo
 */
class AppWebLogo {

    private Array $arrayGrafico;
    private bool $pintar;

    public function __construct($pintar = false, $arrayGrafico = []) {
        $this->pintar = $pintar;
        $this->arrayGrafico = $arrayGrafico;
    }

    public function aniadir(Grafico $n) : void {
        $this->arrayGrafico[] = $n;
    }

    public function getArray() : Array {
        return $this->arrayGrafico;
    }

    

/*     public function getPintar() {
        return($this->pintar);
    }  */

    /* Método para cambiar la variable pintar a false con la que trabajaremos con el botón para darle false*/
/*     public function detenerPintar()  {
        $this->pintar = false;
    } */
    
        /* Método para cambiar la variable pintar a true con la que trabajaremos con el botón para darle play */
/* 
    public function empezarPintar(){
        $this->pintar = true;
    } */


}
