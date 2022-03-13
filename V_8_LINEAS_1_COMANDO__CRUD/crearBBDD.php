<?php

try {
    $dsn = 'mysql:host=db';
    $usuario = 'alumnado';
    $clave = 'alumnado';

    $bd=new PDO($dsn, $usuario, $clave);
    $consulta = "CREATE DATABASE bdLogo CHARACTER SET utf8mb4
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

//Crear tabla Línea
$dsn = 'mysql:dbname=bdLogo;host=db';

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
    echo "<p>Tabla línea creada correctamente.</p>\n";
} else {
    echo "<p>Error al crear la tabla.</p>\n";
}

$bd = null;

//Crear tabla UsuarioLogo
//Con bit en activo: String data, right truncated: 1406 Data too long for column 'activo' at row 1

$bd = new PDO($dsn, $usuario, $clave);

$consulta = "CREATE TABLE usuarioLogo (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    clave varchar(15) not null,
    nombreUsuario varchar(30) not null,
    descripcion varchar(30) not null,
    perfil varchar(10) not null,
    activo int(1) not null,
    PRIMARY KEY(id)
    )";

if ($bd->query($consulta)) {
    echo "<p>Tabla LOGO creada correctamente.</p>\n";
} else {
    echo "<p>Error al crear la tabla.</p>\n";
}

$bd = null;

