<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Alpha Gym</title>
</head>
<body class="body_log">
    <div class="sign log">
        <h4>Ingresa tu usuario y contraseña correctamente</h4>

        <?php

        include("includes/login.php");

        ?>
        
        <form class="inputs" method="post">
            <input type="text" id="usuario" name="usuario" placeholder="Usuario">
            <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña">
            <input type="submit" class="botonn input_enviar" name="enviar" value="Log In">
            <h2>¿Todavía no tienes una cuenta? <a href="https://youtu.be/F7XbB7wA3bI">Registrarse.</a></h2>
        </form>

    </div>
</body>   
</html>