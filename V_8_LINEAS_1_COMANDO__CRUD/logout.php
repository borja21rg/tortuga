<?php
	session_start();
	//borramos sesión
	session_unset();
	//destruimos sesión
	session_destroy();
	try {

		$dsn = 'mysql:dbname=bdLogo;host=db';
		$usuario = 'alumnado';
		$clave = 'alumnado';

		$bd=new PDO($dsn, $usuario, $clave);
		$bd->exec("set character set utf8");
		$resultado=$bd->query("delete from linea");
		$bd->query("insert into linea (x1, y1, x2, y2, pintar) values (400, 250, 400, 250, 1);");

		$bd->query("delete from puntos");



	   
	} catch (PDOException $e) {
		print "    <p>Error: No puede conectarse con la base de datos.</p>\n";
		print "    <p>Error: " . $e->getMessage() . "</p>\n";
		exit();
	}
	
	header("Location:login.php");
?>