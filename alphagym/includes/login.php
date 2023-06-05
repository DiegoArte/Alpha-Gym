<?php

if(!empty($_POST["enviar"])){
    if (empty($_POST["usuario"]) || empty($_POST["contraseña"])) {
        echo '<h3>LOS CAMPOS ESTAN VACIOS</h3>';
    } else {
        require 'config/database.php';
        session_start();
        $usuario=$_POST["usuario"];
        $contraseña=$_POST["contraseña"];
        $consulta="select * from usuarios where usuario='$usuario' and contraseña='$contraseña'";
        $sql=mysqli_query($db, $consulta);

        if ($datos=$sql->fetch_assoc()) {
            $_SESSION['id']=$datos['claveUsuario'];
            $_SESSION['username']=$usuario;
            $_SESSION['image']=$datos['foto'];
            header("location: index.php");
        } else {
            echo '<h3>USUARIO O CONTRASEÑA INCORRECTOS</h3>';
        }
        
    }
    
}

?>