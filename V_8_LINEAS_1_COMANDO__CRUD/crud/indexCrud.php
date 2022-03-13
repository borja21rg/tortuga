<?php
     include('conexion.php');
    //conculta para sacar registros de la tabla si los hay
    $registros=$bd->query("select * from usuarioLogo")->fetchAll(PDO::FETCH_OBJ);

    //CÓDIGO PARA INSERTAR
    //Si se ha enviado el formulario de insertar.....
    if(isset($_POST['insertar'])) {
        
        // $id=$_POST['Id'];
        $clave=$_POST['Cla'];
        $nombre=$_POST['Nom'];
        $descripcion=$_POST['Des'];
        $perfil=$_POST['Per'];
        $activo=$_POST['Act'];

        $sql="insert into usuarioLogo (clave, nombreUsuario, descripcion, perfil, activo)
        values (:cla, :nom, :des, :per, :act)";

        $resultado=$bd->prepare($sql);
        $resultado->execute(array(":cla"=>$clave, ":nom"=>$nombre, ":des"=>$descripcion, ":per"=>$perfil, ":act"=>$activo));
        //Para que se actualice la tabla al insertar registros 
        header("Location:indexCrud.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <title>Página de Usuarios</title>
</head>
<body>
    <br><br>
   
    <form action="<?= $_SERVER['PHP_SELF'];?>" method="post"> 
        <div class="container">
            <button type="submit" class="btn btn-info" name="userNuevo">+ Nuevo Usuario</button>
        </div>
    </form>


    <form action="<?= $_SERVER['PHP_SELF'];?>" method="post"> 
        
        <br><br>
        <div class="container">
            <table class="table">
            <thead class="bg-warning">
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Clave</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
                <th scope="col">Perfil</th>
                <th scope="col">Activo</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            
            <tbody>
            
            <?php 
            //Bucle que recorre los registros de la tabla solicitados al inicio de la página
            foreach($registros as $usuario): ?> 
                <tr class="table-active">
                    <td><?=$usuario->id?></td>
                    <td><?=$usuario->clave?></td>
                    <td><?=$usuario->nombreUsuario?></td>
                    <td><?=$usuario->descripcion?></td>
                    <td><?=$usuario->perfil?></td>
                    <td><?=$usuario->activo?></td>
                    <!-- Pasamos un enlace a la página de borrar con el ID en la dirección-->
                    <td class="bot"><a href="borrar.php?id=<?= $usuario->id ?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
                    <td class='bot'><a href="actualizar.php?id=<?= $usuario->id ?>&cla=<?= $usuario->clave?>&nom=<?= $usuario->nombreUsuario?>&des=<?= $usuario->descripcion?>&per=<?= $usuario->perfil?>&act=<?= $usuario->activo?>"><input type='button' name='up' id='up' value='Actualizar'></a></td>
                </tr>
            <?php endforeach; 
            if(isset($_POST['userNuevo'])) {
            ?> 
                <tr class="table-active">
                    <td></td>
                    <!-- <td><input type='text' name='Id' size='10' class='centrado'></td> -->
                    <td><input type='text' name='Cla' size='10' class='centrado'></td>
                    <td><input type='text' name='Nom' size='10' class='centrado'></td>
                    <td><input type='text' name='Des' size='10' class='centrado'></td>
                    <td><input type='text' name='Per' size='10' class='centrado'></td> 
                    <td><input type='text' name='Act' size='10' class='centrado'></td> 
                    <td colspan="2" class="text-center"><input type='submit' name='insertar' id='up' value='Insertar Usuario'></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
           
            </table>
        </div>
    </form>
<br><br>
    <div class="container">
        <button type="button" class="btn bg-secondary" name=""><a href="../indexMain.php" style="color: white;text-decoration:none">Volver a LOGO</a></button>
    </div>
</body>
</html>