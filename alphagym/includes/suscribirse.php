<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario=$_SESSION['id'];
    if(!isset($usuario)){
        header('location: login.php');
    }else {
        require 'config/database.php';
        $plan=$_POST['plan'];
        $sql="SELECT * FROM planes WHERE clavePlan='$plan'";
        $planF=mysqli_fetch_assoc(mysqli_query($db, $sql));

        $dias=$planF['duracion'];
        $fechaActual = new DateTime();
        $fechaActual->modify("+$dias days");
        $fechaFormateada = $fechaActual->format('Y-m-d');

        $clavePlan=$planF['clavePlan'];
        $sql2="INSERT INTO suscripciones (idsuscripciones, usuarios_claveUsuario, planes_clavePlan, fecha_final) values('$usuario', '$usuario', '$clavePlan', '$fechaFormateada');";

        if (mysqli_query($db, $sql2)) {
            header("location: index.php");
        }
    }
    
        
}