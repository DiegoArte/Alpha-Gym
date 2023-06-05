<?php

session_start();
$idU=$_SESSION['id'];
function obtener_info($idU){
    try{
        require 'database.php';
        $db->set_charset("utf8");
        $sql="SELECT * FROM carritos WHERE usuarios_claveUsuario='$idU'";
        $consulta=mysqli_query($db, $sql);

        $productos=[];
        $i=0;
        while($row=mysqli_fetch_assoc($consulta)) {
            $idP=$row['productos_claveProducto'];
            $sql2="SELECT * FROM productos WHERE claveProducto='$idP'";
            $consulta2=mysqli_query($db, $sql2);
            $row2=mysqli_fetch_assoc($consulta2);
            $productos[$i]['imagen']=$row2['foto'];
            $productos[$i]['nombre']=$row2['nombre'];
            $productos[$i]['precio']=$row2['precio'];
            $productos[$i]['cantidad']=$row['cantidad'];
            $i++;
        }
        return $productos;
    } catch (\Throwable $th){
        var_dump($th);
    }
}

$productos=obtener_info($idU);
echo json_encode($productos);

