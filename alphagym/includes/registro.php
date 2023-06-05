<?php

$error="";

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  require 'config/database.php';
  $clave = rand(1000, 9999);
  $nombre = $_POST['nombre'];
  $apellidoM = $_POST['apellidoM'];
  $apellidoP = $_POST['apellidoP'];
  $email = $_POST['email'];
  $usuario = $_POST['usuario'];
  $contraseña = $_POST['contraseña'];
  $edad = $_POST['edad'];
  $peso = $_POST['peso'];
  $altura = $_POST['altura'];
  $foto='profile.png';

  if(!$nombre){
    $error="Ingrese su nombre";
  }else if(!$apellidoM || !$apellidoP) {
    $error="Ingrese sus apellidos";
  }else if(!$email || filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
    $error="Ingrese un email valido";
  }else if(!$usuario) {
    $error="Ingrese su usuario";
  }else if(!$contraseña || strlen($contraseña)<8) {
    $error="Ingrese una contraseña valida";
  }else if(!$edad) {
    $error="Ingrese su edad";
  }else if(!$peso) {
    $error="Ingrese su peso";
  }else if(!$altura) {
    $error="Ingrese su altura";
  }

  require 'config/usuarios.php';
  while($row=mysqli_fetch_assoc($usuarios)){
    if($usuario==$row['usuario']){
      $error="Nombre de usuario no disponible";
    }
  }

  if($error==""){
    $sql="INSERT INTO usuarios (claveUsuario, nombre, apellidoM, apellidoP, correo, contraseña, edad, foto, usuario, peso, altura) VALUES ('$clave', '$nombre', '$apellidoM', '$apellidoP', '$email', '$contraseña', '$edad', '$foto', '$usuario', '$peso', '$altura')";
    if (mysqli_query($db, $sql)) {
      session_start();
      $_SESSION['id']=$clave;
      $_SESSION['username']=$usuario;
      $_SESSION['image']=$foto;
      header("location: sel_imagen.php");
    } else {
      echo '<h3>Error al enviar</h3>';
    }
  }else {
    echo '<h3>'.$error.'</h3>';
  }
}