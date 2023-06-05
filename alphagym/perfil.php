<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Usuario</title>
</head>
<body class="fondo_producto">
  <div id="header"></div>
  <?php
  session_start();
  $id=$_SESSION['id'];
  require 'includes/config/database.php';
  $sql="SELECT * FROM usuarios WHERE claveUsuario='$id'";
  $consulta=mysqli_query($db, $sql);
  $row=mysqli_fetch_assoc($consulta);
  ?>
  <center><img src="img/perfiles/<?php echo $row['foto']; ?>" id="circle"></center>
  <div id="user-name"><?php 
  $nombreCompleto=$row['nombre']." ".$row['apellidoM']." ".$row['apellidoP'];
  echo $nombreCompleto; 
  ?></div>
  <div class="sombra datos_perfil">
    <div id="data-title">Datos</div>
    <table id="data-table">
      <tr>
        <td>Usuario:</td>
        <td><?php echo $row['usuario']; ?></td>
      </tr>
      <tr>
        <td>Correo:</td>
        <td><?php echo $row['correo']; ?></td>
      </tr>
      <tr>
        <td>Edad:</td>
        <td><?php echo $row['edad']; ?> años</td>
      </tr>
      <tr>
        <td>Peso:</td>
        <td><?php echo $row['peso']; ?> Kg</td>
      </tr>
      <tr>
        <td>Altura:</td>
        <td><?php echo $row['altura']; ?> M</td>
      </tr>
      <tr>
        <td>Suscripción:</td>
        <td>
          <?php
          $sus=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM suscripciones WHERE usuarios_claveUsuario='$id'"));
          if(!isset($sus)){
            echo "Sin suscripción";
          }else {
            $nombrePlan=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM suscripciones, planes WHERE suscripciones.planes_clavePlan=planes.clavePlan AND usuarios_claveUsuario=$id"));
            $diasFaltantes = floor((strtotime($sus['fecha_final']) - strtotime(date("Y-m-d"))) / 86400);
            echo $nombrePlan['nombre']."-"." Tiempo restante: ".$diasFaltantes." dias";
          }
          ?>
        </td>
      </tr>
    </table>
  </div>
</body>
</html>
