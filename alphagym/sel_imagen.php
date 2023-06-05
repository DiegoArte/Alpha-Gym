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
        <div class="select">
            <h4>Selecciona una foto de perfil</h4>
            <img class="profile" src="img/profile.png" loading="lazy">
            <a href="index.html">Omitir</a>
            <div class="opciones_pic">
                <button onclick="imagen(1)">Tomar foto</button>
                <button onclick="imagen(2)">Elegir foto</button>
            </div>
            <form class="subir_img" name="formuImg" method="post" enctype="multipart/form-data">
                
            </form>
            <?php
                require 'includes/subir_img.php';
            ?>
        </div>
    </div>
    <script src="js/registro.js"></script>
</body>
</html>