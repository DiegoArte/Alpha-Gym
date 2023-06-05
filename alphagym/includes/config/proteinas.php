<?php

require 'productos.php';

$proteinas=productos('Proteina');
echo json_encode($proteinas);