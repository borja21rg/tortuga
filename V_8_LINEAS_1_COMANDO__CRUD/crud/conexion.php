<?php
require ('datos_conexion.php');

try {

    $bd=new PDO($dsn, $usuario, $clave);

} catch (PDOException $e) {
    print "    <p>Error: No puede conectarse con la base de datos.</p>\n";
    print "    <p>Error: " . $e->getMessage() . "</p>\n";
    exit();
}





?>