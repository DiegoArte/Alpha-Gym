<?php

function producto_info($id) : array {
    try{
        require 'database.php';
        $db->set_charset("utf8");
        
        $sql="SELECT * FROM productos WHERE claveProducto='$id'";
        $consulta=mysqli_query($db, $sql);
        $row=mysqli_fetch_assoc($consulta);
        return $row;
    } catch (\Throwable $th){
        var_dump($th);
    }
}