<?php
	session_start();
	//borramos sesión
	session_unset();
	//destruimos sesión
	session_destroy();
	try {
		// require("./configConexionBBDD.php");
		$dsn = 'mysql:dbname=bdLogo;host=db';
		$usuario = 'alumnado';
		$clave = 'alumnado';

		$bd=new PDO($dsn, $usuario, $clave);
		$bd->exec("set character set utf8");
		$resultado=$bd->query("delete from linea");

		// return $this->circulos;

	   
	} catch (PDOException $e) {
		print "    <p>Error: No puede conectarse con la base de datos.</p>\n";
		print "    <p>Error: " . $e->getMessage() . "</p>\n";
		exit();
	}
	
	header("Location:indexMain.php");
?>