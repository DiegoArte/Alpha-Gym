<h2>Tu plan</h2>
<div class="planes">
    <div class="plan">
        <?php
        $nombrePlan=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM suscripciones, planes WHERE suscripciones.planes_clavePlan=planes.clavePlan AND usuarios_claveUsuario=$idU"));
        ?>
        <h3><?php echo $nombrePlan['nombre']; ?></h3>
        <img src="" class="qr">
        <input type="text" style="visibility: hidden" value="<?php echo $idU; ?>" class="qrcode">
        <button class="boton1 botonn" onclick="descargarImagen()">Descargar QR</button>
    </div>
</div>