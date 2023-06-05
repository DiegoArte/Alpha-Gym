<?php

function productos($categoria) : array {
    try{
        require 'database.php';
        $db->set_charset("utf8");
        
        $sql="SELECT * FROM productos WHERE categoria='$categoria'";
        $consulta=mysqli_query($db, $sql);
        $productos=[];
        $i=0;
        while($row=mysqli_fetch_assoc($consulta)){
            $productos[$i]['id']=$row['claveProducto'];
            $productos[$i]['nombre']=$row['nombre'];
            $productos[$i]['precio']=$row['precio'];
            $productos[$i]['foto']=$row['foto'];
            $i++;
        }
        return $productos;
        //Obtener los resultados
    } catch (\Throwable $th){
        var_dump($th);
    }
}