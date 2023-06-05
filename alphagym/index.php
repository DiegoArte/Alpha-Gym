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
<body>
    <header>
        <div class="barra">
            <nav class="navegacion">
                <a href="#tienda">Tienda</a>
                <a href="#servicios">Servicios</a>
                <a href="#planes">Planes</a>
                <a href="#sobre-nosotros">Sobre nosotros</a>
            </nav>
            <?php
            session_start();
            $usuario=$_SESSION['username'];
            $idU=$_SESSION['id'];
            if(!isset($usuario)){
                require 'includes/elements/no_session.php';
            }else {
                require 'includes/elements/session.php';
            }
            ?>
        </div>
        <div class="panel">
            <div class="panel_text">
                <h1>The Alpha Gym</h1>
                <h3>Y la que entrene.</h3>               
            </div>
        </div>
    </header>

    <main class="contenedor main">
        <section class="tienda" id="tienda">
            <h2>Tienda</h2>
            <a href="tienda.php">Ver todos</a>
            <div class="carousel__contenedor">
                <button aria-label="Anterior" class="carousel__anterior">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="carousel__lista">
                    
                </div>

                <button aria-label="Siguiente" class="carousel__siguiente">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <div role="tablist" class="carousel__indicadores"></div>
        </section>

        <section id="servicios">
            <h2>Nuestros servicios</h2>
            <div class="img_contenedor">
                <img src="img/body_pump.jpg" loading="lazy">
                <img src="img/cardio.jpg" loading="lazy">
                <img src="img/calentamiento.jpg" loading="lazy">
                <img src="img/crossfit.png" loading="lazy">
            </div>
        </section>

        <section class="contenedor" id="planes">
            <?php
            require 'includes/config/database.php';
            $sus=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM suscripciones WHERE usuarios_claveUsuario='$idU'"));
            if(!isset($sus)){
                require 'includes/elements/no_sub.php';
            }else {
                require 'includes/elements/sub.php';
            }
            ?>
            
        </section>
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
    <div class="overlay" id="overlay" style="display: none;">
        <?php
        require 'includes/suscribirse.php';
        ?>
        <form class="modal" method="post">
            <div class="close-button" onclick="closeModal()">
                <img src="img/volver-flecha.png" alt="Cerrar">
                <span>Añadir tarjeta de crédito o débito</span>
            </div>
            <div class="small-text">Todos los campos son obligatorios</div>
            <div class="form-input">
                <img src="img/tarjeta-bancaria.png" class="image-small">
                <input type="text" placeholder="Número de tarjeta" class="line-input">
            </div>
            <div class="form-input">
                <input type="text" placeholder="MM/AA" class="line-input">
                <input type="text" placeholder="Código de seguridad" class="line-input">
            </div>
            <div class="title">Titular de la tarjeta</div>
            <input type="text" placeholder="Nombre del titular" class="line-input">
            <div class="title">Código postal</div>
            <div class="form-input">
                <input type="text" placeholder="Código postal de facturación" class="line-input">
            </div>
            <div class="title">País o región</div>
            <div>
                <select class="line-input">
                <option value="">Seleccionar país</option>
                <option value="México">México</option>
                <option value="Argentina">Argentina</option>
                <option value="España">España</option>
                </select>
            </div>
            <div class="form-input">
                <input type="submit" value="Pagar con tarjeta" class="pay-button botonn">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>
</html>