<?php

session_start();
$idU=$_SESSION['id'];

$prod = $_POST['prod'];

require '../config/database.php';

$union=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM carritos, productos 
    WHERE carritos.productos_claveProducto = productos.claveProducto 
    AND usuarios_claveUsuario = '$idU' AND productos.nombre = '$prod'"));
$cantidadC=$union['cantidad'];
$idP=$union['productos_claveProducto'];


$sql="DELETE carritos 
FROM carritos, productos 
WHERE carritos.productos_claveProducto = productos.claveProducto 
AND usuarios_claveUsuario = '$idU' AND productos.nombre = '$prod'";

if (mysqli_query($db, $sql)) {
    if (mysqli_query($db, "UPDATE inventario SET cantidad=cantidad+'$cantidadC' WHERE claveProductoIn='$idP'")) {
        header("location: tienda.php");
        exit();
    }
}