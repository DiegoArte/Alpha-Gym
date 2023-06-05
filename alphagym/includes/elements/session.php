<?php
$usuario=$_SESSION['username'];
$imagen=$_SESSION['image'];
?>
<div class="sesion">
    <p><?php echo $usuario ?></p>
    <img class="foto_perfil" src="img/perfiles/<?php echo $imagen ?>" alt="">
    <div class="dropdown">
        <img src="img/arrow.png" alt="">
        <div class="dropdown-content">
            <a href="perfil.php">Perfil</a>
            <a href="includes/logout.php">Log Out</a>
        </div>
    </div>
</div>