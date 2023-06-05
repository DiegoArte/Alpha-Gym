<?php

require 'productos.php';

$creatinas=productos('Creatina');
echo json_encode($creatinas);