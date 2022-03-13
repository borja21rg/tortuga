<?php

    include("conexion.php");

    //Recibe un parámetro = ID que lo recibirá por URL

    $id=$_GET['id'];

    $bd->query("delete from usuarioLogo where id='$id'");

    header('Location:indexCrud.php');

?>