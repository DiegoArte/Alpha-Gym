<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>AlphaGym</title>
</head>
<body class="fondo_producto">
    <header>
        <div class="barra">
            <?php
            session_start();
            $usuario=$_SESSION['username'];
            if(!isset($usuario)){
                require 'includes/elements/no_session.php';
            }else {
                require 'includes/elements/session.php';
                require 'includes/elements/carritoFun.php';
            }

            $id=$_GET['id'];
            require 'includes/config/productos_info.php';
            $info=producto_info($id);

            require 'includes/config/proveedor.php';
            $prov=proveedor($info['claveProveedorP']);

            require 'includes/config/inventario.php';
            $inv=inventario($info['claveProducto']);
            ?>
        </div>
    </header>

    <main class="contenedor main producto">
        <div class="imagenes_producto">
            <div class="front">
                <img src="img/productos/producto/<?php echo $info['foto']; ?>">
            </div>
            <div class="back">
                <img src="img/productos/informacion nutrimental/<?php echo $info['foto']; ?>">
            </div>
        </div>
        <div class="info_producto sombra">
            <h4><?php echo $info['nombre']; ?></h4>
            <h5><?php echo $prov['nombre']; ?></h5>
            <h4>$<?php echo $info['precio']; ?></h4>
            <p><?php echo $info['descripción']; ?></p>
            <center><p>Cantidad Disponible: <?php echo $inv['cantidad']; ?></p></center>
            <button class="info_producto_button" onclick="agregar()">
                Agregar al carrito
                <img src="img/carrito.png" alt="">
            </button>
        </div>
    </main>

    <footer class="footer-index" id="sobre-nosotros">
        <div class="content-footer">
            <div class="footer-contenedor">
                <h3>Sobre nosotros</h3>
                <p>Somos una empresa que está comprometida
                    con el público general para brindarle 
                    los mejores servicios y oportunidades 
                    de mejorar su calidad de vida a través 
                    de la actividad física y el fortalecimiento 
                    físico. Nos importa el bienestar de nuestros 
                    usuarios y que tengan la mejor experiencia posible
                    tanto en nuestro sitio como en nuestras instalaciones físicas,
                    si eres nuevo por aquí, te damos la bienvenida!.
                </p>
                <hr>
                <div class="pie-pag-footer">
                    <p><i>"Your only limit is the one you set for yourself"</i></p>
                    <p>Todos los derechos reservados. 2023</p>
                </div>
            </div>
        </div>
    </footer>
    <div class="overlay" style="display: none;">
        <div class="info_producto fixed">
            <div>
                <img src="img/productos/producto/<?php echo $info['foto']; ?>">
                <?php
                $idU=$_SESSION['id'];
                require 'includes/agregar_carrito.php';
                carrito_compras($idU, $id);
                ?>
                <form class="info_carrito" method="post">
                    <label class="negritas">Agregar: <?php echo $info['nombre']; ?></label>
                    <label class="negritas">Precio: $<?php echo $info['precio']; ?></label>
                    <label class="cantidadL">Cantidad: 0</label>
                    <input class="slider" type="range" name="cantidad" min="0" max="<?php echo $inv['cantidad']; ?>" step="1" value="0" onchange="valor()">
                    <label>Disponibles: <?php echo $inv['cantidad']; ?></label>
                    <input type="submit" value="Agregar" class="signup botonn">
                </form>
            </div>
        </div>
        <p class="cerrar">X</p>
    </div>
    <script src="js/index.js"></script>
    <script src="js/carrito.js"></script>
</body>
</html>