<?php
session_start();//Iniciamos una sesion
//Si  existe la sesion
if(isset($_SESSION['activa'])){

    //Redirige a pagina principal
if($_SESSION['activa']){
    header("Location: indexMain.php");
} 
}

if(isset($_POST['nombre'] ) && isset($_POST['contrasena'])){     //Si usuario y contrasena existen 
    //Guardamos la sesión para conectarnos a nuestra bbdd
$dsn = 'mysql:dbname=bdLogo;host=db';
$usuario = 'alumnado';
$clave = 'alumnado';
$bd = new PDO($dsn, $usuario, $clave);

$consultaUsuarios = 'Select * from usuarioLogo WHERE activo = 1'; //Creo que no me filtra la consulta bien?
$resultado = $bd->query($consultaUsuarios);

    foreach ($resultado as $elemento) {
/*         print_r($elemento); */

/* $patron = "/^[a-z][a-z0-9_]*@gmail\.(com|es)$/"; //Patron con el que vamos a validar las cadenas
$patronContraseña = "/^Abcd2929$/"; */

        //Si los datos coinciden con los guardados el la bbdd entrara como admin
if ($elemento['nombreUsuario'] == $_POST['nombre'] && $elemento['clave'] == $_POST['contrasena'] && $elemento['perfil'] == "Profesor"){

    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['perfil'] = $elemento['perfil'];
        $_SESSION['activa'] = true;
        header("Location: indexMain.php");


        //Si los datos intrducidos no coinciden con el de admin y cumplen el patron entrara como imvitado
}if($elemento['nombreUsuario'] == $_POST['nombre'] && $elemento['clave'] == $_POST['contrasena'] && $elemento['perfil'] == "Alumno"){    

    $_SESSION['nombre'] = $_POST['nombre'];
    $_SESSION['perfil'] = $elemento['perfil'];
    $_SESSION['activa'] = true;
    header("Location: indexMain.php");


    //Si no se mostrara el formulario recordándote que as introducido algo mal
}
}
}
    //Si usuario y contrasena no se han introducido
    if(!isset($_POST['nombre'] ) && !isset($_POST['contrasena'])){  

        //Mostramos unn formulario para que lo introduzca
        include "./librerias/libreriaLogin.php";
        cabecera("Login", "Aprende a usar LOGO");
    
    }else {       
        //Mostramos unn formulario para que lo introduzca
            include "./librerias/libreriaLoginM.php";
            cabecera("Login", "Aprende a usar LOGO");
            
            }