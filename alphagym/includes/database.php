<?php

$db=mysqli_connect('localhost', 'root', 'changeme', 'alphagym');

if (!$db) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}
