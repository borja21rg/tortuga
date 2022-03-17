<?php
     
//CLASE QUE CONECTA CON BBDD

class Conectar {

    static function conexion() {
        try {
            require("./configConexionBBDD.php");

            $bd=new PDO($dsn, $usuario, $clave);
            $bd->exec("set character set utf8");
           
        } catch (PDOException $e) {
            print "    <p>Error: No puede conectarse con la base de datos.</p>\n";
            print "    <p>Error: " . $e->getMessage() . "</p>\n";
            exit();
        }

        return $bd; //devuelve la conexión
    }
}


?>