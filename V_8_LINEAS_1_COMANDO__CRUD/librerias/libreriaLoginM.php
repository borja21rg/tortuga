<?php
function cabecera($titulo1,$titulo2){//Funcion para la creacion de una libreria con la parte principal de html
 echo "<!DOCTYPE html>\n";
 echo "<html lang=\"es\">\n";
 echo "<head>\n";
 echo " <meta charset=\"utf-8\">\n";
 echo "<link rel='stylesheet' href='css/reset.css'>
 <link href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
 <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css'>
 <link rel='stylesheet' href='./CSS/style.css'>
 <link rel='shortcut icon' href='./img/tortuga.png'>
 <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>";
 echo " <title>$titulo1</title>\n";
 echo "</head>\n";

echo "<body>\n";

echo "
  <div class='container-fluiz'>
<header class='row ' >\n
 <h1 class='col text-center p-4 '>$titulo2</h1>\n
 </header>\n
    <div class='row'>

        <div class='col-md-6 mx-auto py-4 px-0'>

            <div class='card p-0 rounded'>
            
                <div class='card-title text-center'>
                    <h5 class='mt-5'>Iniciar Sesión</h5> 
                </div>

                <form class='signup justify-content-center' name='inicio' action='".$_SERVER['PHP_SELF']."' method='post'>

                    <div class='form-group'><input type='text' class='form-control' placeholder='Usuario' name='nombre' required></div>

                    <div class='form-group'><span class='input-group-addon'><i class='fa fa-password bigicon'></i></span><input type='password' class='form-control' placeholder='Contraseña' name='contrasena' required></div> 
                    <div class='col-12 col-sm-12 '> 
                    <p class='text-center pt-2 mr-1'>Datos introducidos erróneos</p>
                    </div>
                    <button type='submit' class='btn   mb-4'>Entrar</button>
                    
                </form>

            </div>
        </div>
    </div>
</div>
<footer class='row justify-content-center text-center p-4'>
<p class='col'> &copy; Grupo 5 | Logo</p>
</footer>";
echo "</body>\n";
echo "</html>\n";
}


