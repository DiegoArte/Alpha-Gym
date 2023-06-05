<?php

session_start();
$idU=$_SESSION['id'];

$total = $_POST['total'];

require 'config/database.php';

$sql="SELECT * FROM carritos WHERE usuarios_claveUsuario='$idU'";
$consulta=mysqli_query($db, $sql);
while($row=mysqli_fetch_assoc($consulta)){
    $idP=$row['productos_claveProducto'];
    $cantidad=$row['cantidad'];
    mysqli_query($db, "INSERT INTO pedidos (usuarios_claveUsuario, productos_claveProducto, cantidad, total) VALUES ('$idU', '$idP', '$cantidad', '$total')");
}
mysqli_query($db, "DELETE FROM carritos WHERE usuarios_claveUsuario=$idU");
header("location: tienda.php");
exit();