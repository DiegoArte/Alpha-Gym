<?php

require 'includes/recomendados.php';

$PRecomendados=recomendaciones();
echo json_encode($PRecomendados);