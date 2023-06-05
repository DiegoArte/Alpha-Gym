<?php

require 'database.php';
$db->set_charset("utf8");

$usuarios=mysqli_query($db, "SELECT * FROM usuarios");

?>