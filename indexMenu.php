<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>LOGO</title>
</head>

<body>
    <h1>Aprende a usar LOGO</h1>
    <div id="svg">
        <svg width="500" height="500" style="border:1px solid black">
            <?php
            //Aqui hay que meter el dibujar de lo que esté guardado en session
            ?>
        </svg>
    </div>
    <form action="index.php" method="post">
        <input type="text" name="comandos">
        <button type="submit" value="Enviar"></button>
    </form>
</body>

</html>