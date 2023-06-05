<?php

function recomendaciones() : array {
    try{
        require 'config/database.php';
        $db->set_charset("utf8");
        
        $sql2="SELECT * FROM productos";
        $consulta2=mysqli_query($db, $sql2);
        $PRecomendados=[];
        $i=0;
        while($row=mysqli_fetch_assoc($consulta2)){
            $sql1="SELECT * FROM productos_recomendados";
            $consulta1=mysqli_query($db, $sql1);
            while($row2=mysqli_fetch_assoc($consulta1)){
                if($row['claveProducto']==$row2['productos_claveProducto']){
                    $PRecomendados[$i]['id']=$row['claveProducto'];
                    $PRecomendados[$i]['nombre']=$row['nombre'];
                    $PRecomendados[$i]['precio']=$row['precio'];
                    $PRecomendados[$i]['foto']=$row['foto'];
                    $i++;
                }
            }
        }
        return $PRecomendados;
        //Obtener los resultados
    } catch (\Throwable $th){
        var_dump($th);
    }
}

recomendaciones();
