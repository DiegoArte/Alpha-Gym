<?php

function carrito_compras($idU, $idP) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        session_start();
        $usuario=$_SESSION['username'];
        if(!isset($usuario)){
            header('location: login.php');
        }else {
            require 'config/database.php';
            $cantidadC = $_POST['cantidad'];
            $sql="INSERT INTO carritos (usuarios_claveUsuario, productos_claveProducto, cantidad) VALUES ('$idU', '$idP', '$cantidadC')";
            if (mysqli_query($db, $sql)) {
                $sql2="UPDATE inventario SET cantidad=cantidad-'$cantidadC' WHERE claveProductoIn='$idP'";
                if (mysqli_query($db, $sql2)) {
                    header("location: tienda.php");
                }
            }
        }
        
    }
}
