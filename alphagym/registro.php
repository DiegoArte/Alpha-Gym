
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <title>AlphaGym</title>
</head>
<body class="body_log">
    <div class="sign">
        <h4>Ingresa tus datos correctamente</h4>
            <?php
            require 'includes/registro.php';
            ?>
        <div class="sign_form">
            <form id="signF" name="formuSign" method="post">
                <label>Nombre:</label>
                <input type="text" name="nombre" class="input_text">
                <label>Apellido materno:</label>
                <input type="text" name="apellidoM" class="input_text">
                <label>Apellido paterno:</label>
                <input type="text" name="apellidoP" class="input_text">
                <label>Correo:</label>
                <input type="email" name="email" class="input_text">
                <label>Usuario:</label>
                <input type="text" name="usuario" class="input_text">
                <label>Contraseña:</label>
                <input type="password" name="contraseña" class="input_text">
                <label>Edad:</label>
                <input type="number" min="12" max="70" class="input_num" name="edad">
                <label>Peso:</label>
                <input type="number" min="20" max="300" step="0.5" class="input_num" name="peso">
                <label>Altura:</label>
                <input type="number" min="0.5" max="2.5" step="0.01" class="input_num" name="altura">
                <input type="submit" value="Aceptar" class="signup botonn" id="enviar">
            </form>
        </div>
    </div>
</body>
</html>