<?php
	session_start();
	//borramos sesión
	session_unset();
	//destruimos sesión
	session_destroy();
	//echo "<h2>Has cerrado sesión</h2>";
	// "<p><a href=\"../indexMenu.html\">Vuelve al formulario</a></p>\n";
	header("Location:index.php");
?>