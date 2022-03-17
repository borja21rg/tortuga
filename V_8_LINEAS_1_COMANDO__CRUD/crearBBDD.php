<?php

try {
    $dsn = 'mysql:host=db';
    $usuario = 'alumnado';
    $clave = 'alumnado';

    $bd=new PDO($dsn, $usuario, $clave);
    $consulta = "CREATE DATABASE IF NOT EXISTS  bdLogo  CHARACTER SET utf8mb4
        COLLATE utf8mb4_unicode_ci ";
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

$consulta = "CREATE TABLE IF NOT EXISTS linea (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    x1 int not null,
    y1 int not null,
    x2 int not null,
    y2 int not null,
    pintar bit not null,
    PRIMARY KEY(id)
    )";

if ($bd->query($consulta)) {
    echo "<p>Tabla línea creada correctamente.</p>\n";
} else {
    echo "<p>Error al crear la tabla.</p>\n";
}
$bd->query("insert into linea (x1, y1, x2, y2, pintar) values (400, 250, 400, 250, 1);");

$bd = null;

//Crear tabla UsuarioLogo
//Con bit en activo: String data, right truncated: 1406 Data too long for column 'activo' at row 1

$bd = new PDO($dsn, $usuario, $clave);

$consulta = "CREATE TABLE IF NOT EXISTS usuarioLogo (
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

/* Insertamos unos registros en la tabla usuarioLogo */
$insertarDatosUsuario = "INSERT INTO usuarioLogo(clave, nombreUsuario, descripcion, perfil, activo) VALUES ('12345', 'Hugo', 'Hugo González Gijón', 'Profesor', 1);
INSERT INTO usuarioLogo(clave, nombreUsuario, descripcion, perfil, activo) VALUES ('12345', 'Alfredo', 'Alfredo Antonio Sanz Da Silva', 'Alumno', 1);
INSERT INTO usuarioLogo(clave, nombreUsuario, descripcion, perfil, activo) VALUES ('12345', 'Mario', 'Mario Ordóñez Fernández', 'Alumno', 0);
INSERT INTO usuarioLogo(clave, nombreUsuario, descripcion, perfil, activo) VALUES ('12345', 'Esther', 'Esther Sánchez García', 'Alumno', 1);";
 $resul2 = $bd->query($insertarDatosUsuario);
 if($resul2){
     echo "Filas insertadas: " . $resul2->rowCount() . "<br>";
 }else{
     print_r( $bd -> errorInfo());
 }

$bd = null;

//Crear tabla Puntos
$dsn = 'mysql:dbname=bdLogo;host=db';

$bd = new PDO($dsn, $usuario, $clave);

$consulta = "CREATE TABLE IF NOT EXISTS puntos (
    id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
    x int not null,
    y int not null,
    PRIMARY KEY(id)
    )";

if ($bd->query($consulta)) {
    echo "<p>Tabla punto creada correctamente.</p>\n";
} else {
    echo "<p>Error al crear la tabla.</p>\n";
}

$bd = null;

