<?php

require 'productos.php';

$preentrenos=productos('Pre-entreno');
echo json_encode($preentrenos);