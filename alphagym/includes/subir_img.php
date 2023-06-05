<?php

if (!empty($_POST["Subir"])) {
    require 'config/database.php';
    session_start();
    $usuario = $_SESSION['username'];

    $foto_temporal = $_FILES["imagen"]["tmp_name"];
    $foto_nombre = $_FILES["imagen"]["name"];
    $foto_destino = 'img/perfiles/' . $foto_nombre;

    $act_foto = mysqli_query($db, "UPDATE usuarios SET foto='$foto_nombre' WHERE usuario='$usuario'");

    if ($act_foto && $foto_temporal && move_uploaded_file($foto_temporal, $foto_destino)) {
        $_SESSION['image']=$foto_temporal;
        header("Location: index.php");
        exit();
    } else {
        echo '<h3>Error al enviar</h3>';
    }
}