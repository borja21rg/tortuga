<?php
function cabecera($titulo1, $titulo2){//Funcion para la creacion de una libreria con la parte principal de html
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
echo " <style>\n
h1,
#svg,
#form {
  text-align: center;
}
</style>\n";
echo "<body>\n";
echo "<div class='container-fluiz'>\n";

echo "<header class='row ' >\n";
echo " <h1 class='col text-center p-4 '>$titulo2</h1>\n";
echo " </header>\n";


echo "<div class ='col-12 text-center' >\n";
echo "<svg class='ml-2' width='800' height='500' >\n";
}
