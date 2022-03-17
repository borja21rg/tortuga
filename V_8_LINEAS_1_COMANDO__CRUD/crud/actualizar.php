<?php

  include ('conexion.php');
  
  //Si no ha enviado el formulario actualizar... pillas datos del GET
  if(!isset($_POST['bot_actualizar'])) {

    $id=$_GET['id'];
    $clave=$_GET['cla'];
    $nombre=$_GET['nom'];
    $descripcion=$_GET['des'];
    $perfil=$_GET['per'];
    $activo=$_GET['act'];
  
  } else { //pillas datos del POST

    $id=$_POST['id'];
    $clave=$_POST['cla'];
    $nombre=$_POST['nom'];
    $descripcion=$_POST['des'];
    $perfil=$_POST['per'];
    $activo=$_POST['act'];

    $sql="update usuarioLogo set clave=:uCla, nombreUsuario=:uNom, descripcion=:uDes, perfil=:uPer, activo=:uAct where id=:uId";

    $resultado=$bd->prepare($sql);

    $resultado->execute(array(":uId"=>$id, ":uCla"=>$clave, ":uNom"=>$nombre, ":uDes"=>$descripcion, ":uPer"=>$perfil, ":uAct"=>$activo));

    header('Location:indexCrud.php');

  }

  //Llegan los datos por GET pero al darle a actualizar tiene que coger los datos del nuevo formulario por POST

?>
<!Doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>
 
<p>&nbsp;</p>
<form name="form1" method="post" action="<?=$_SERVER['PHP_SELF'];?>">
<div class="container">
    <table class="table" width="50%">
    <thead class="bg-warning text-center">
      <tr>
        <td colspan="2"><h4>Actualizar Usuario</h4></td>
      </tr>
    </thead>
      <tr>
        <td><label for="id"></label></td>
        <!-- Campo ID no se ve pero nos vale para identificar producto de la consulta-->
        <td><input type="hidden" name="id" id="id" value="<?= $id ?>"></td> 
      </tr>
      <tr class="table-active text-center">
        <td>Clave</td>
        <td><label for="cla"></label>
        <input type="text" name="cla" id="cla" value="<?= $clave ?>"></td>
      </tr>
      <tr class="table-active text-center">
        <td>Nombre</td>
        <td><label for="nom"></label>
        <input type="text" name="nom" id="nom" value="<?= $nombre ?>"></td>
      </tr>
      <tr class="table-active text-center">
        <td>Descripción</td>
        <td><label for="des"></label>
        <input type="text" name="des" id="des" value="<?= $descripcion ?>"></td>
      </tr>
      <tr class="table-active text-center">
        <td>Perfil</td>
        <td><label for="per"></label>
        <input type="text" name="per" id="per" value="<?= $perfil ?>"></td>
      </tr>
      <tr class="table-active text-center">
        <td>Activo</td>
        <td><label for="act"></label>
        <input type="text" name="act" id="act" value="<?= $activo ?>"></td>
      </tr>
      <tr class="table-active text-center">
        <td colspan="2"><input type="submit" class="btn btn-info text-white" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
      </tr>
    </table>
  </div>
</form>



</body>
</html>