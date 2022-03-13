<?php

try {
    $dsn = 'mysql:host=db';
    $usuario = 'alumnado';
    $clave = 'alumnado';

    $bd=new PDO($dsn, $usuario, $clave);
    $consulta = "CREATE DATABASE bdLinea CHARACTER SET utf8mb4
        COLLATE utf8mb4_unicode_ci";
    if ($bd->query($consulta)) {
        echo "<p>Base de datos creada correctamente.</p>\n";
    } else {
        echo "<p>Error al crear la base de datos.</p>\n";
    }
    $bd = null;
} catch (PDOException $e) {
    print "    <p>Error: No puede conectarse con la base de datos.</p>\n";
    print "    <p>Error: " . $e->getMessage() . "</p>\n";
    exit();
}

$dsn = 'mysql:dbname=bdLinea;host=db';

//Crear tabla Línea
$bd = new PDO($dsn, $usuario, $clave);

$consulta = "CREATE TABLE linea (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    x1 int not null,
    y1 int not null,
    x2 int not null,
    y2 int not null,
    PRIMARY KEY(id)
    )";

if ($bd->query($consulta)) {
    echo "<p>Tabla círculo creada correctamente.</p>\n";
} else {
    echo "<p>Error al crear la tabla.</p>\n";
}

$bd = null;

