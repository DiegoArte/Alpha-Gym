<?php

$db=mysqli_connect('localhost', 'root', 'changeme', 'gym');

if (!$db) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}
