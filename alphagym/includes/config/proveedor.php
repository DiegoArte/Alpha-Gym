<?php

function proveedor($id) : array {
    try{
        require 'database.php';
        $db->set_charset("utf8");
        
        $sql="SELECT * FROM proveedores WHERE claveProveedor='$id'";
        $consulta=mysqli_query($db, $sql);
        $row=mysqli_fetch_assoc($consulta);
        return $row;
    } catch (\Throwable $th){
        var_dump($th);
    }
}