<?php

require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $clave = rand(1000, 9999);
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $direccion = $_POST['direccion'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    $sql="INSERT INTO usuarios (claveUsuario, nombre, Apellidos, correo, contraseña, edad, foto, usuario) VALUES ('$clave', '$nombre', '$apellidos', '$email', '$contraseña', '$edad', '$clave+'.png'', '$usuario');";
    $sql2="INSERT INTO perfiles (clavePerfil, altura, peso) VALUES ('$clave', '$altura', '$peso');";

    if (mysqli_query($db, $sql)&&mysqli_query($db, $sql2)) {
        die("Enviado correctamente");
      } else {
        die("Error al enviar");
      }
}

mysqli_close($db);