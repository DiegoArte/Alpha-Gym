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
            <?php
            session_start();
            $usuario=$_SESSION['username'];
            if(!isset($usuario)){
                require 'includes/elements/no_session.php';
            }else {
                require 'includes/elements/session.php';
                require 'includes/elements/carritoFun.php';
            }
            ?>
        </div>
    </header>

    <main class="contenedor main">
        <div class="ofertas">
            <ul>
                <li>
                    <img src="img/banner1.png">
                </li>
                <li>
                    <img src="img/banner2.png">
                </li>
                <li>
                    <img src="img/banner3.png">
                </li>
                <li>
                    <img src="img/banner4.png">
                </li>
            </ul>
        </div>

        <div>
            <h2>Proteina</h2>
            <div class="carousel__contenedor">
                <button aria-label="Anterior" class="carousel__anterior carousel__anterior1">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="carousel__lista1">
                    
                </div>

                <button aria-label="Siguiente" class="carousel__siguiente carousel__siguiente1">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <div role="tablist" class="carousel__indicadores carousel__indicadores1"></div>
        </div>

        <div>
            <h2>Pre-entreno</h2>
            <div class="carousel__contenedor">
                <button aria-label="Anterior" class="carousel__anterior carousel__anterior2">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="carousel__lista2">
                    
                </div>

                <button aria-label="Siguiente" class="carousel__siguiente carousel__siguiente2">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <div role="tablist" class="carousel__indicadores carousel__indicadores2"></div>
        </div>

        <div>
            <h2>Creatina</h2>
            <div class="carousel__contenedor">
                <button aria-label="Anterior" class="carousel__anterior carousel__anterior3">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <div class="carousel__lista3">
                    
                </div>

                <button aria-label="Siguiente" class="carousel__siguiente carousel__siguiente3">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>

            <div role="tablist" class="carousel__indicadores carousel__indicadores3"></div>
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

    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
    <script src="js/tienda.js"></script>
    <script src="js/carrito.js"></script>
</body>
</html>