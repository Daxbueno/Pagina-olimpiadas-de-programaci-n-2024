<?php

include("db/db.php");
include("scripts/generarCardsProductos.php");

$db = new Database();

$con = $db->conectar();

$cardsProductos = new CardsProductos();

session_start();
    if (isset($_SESSION["loggedin"])){
        if ($_SESSION["loggedin"] == true){
            $usuariologeado = $_SESSION["email"];
        }
        else{
            header("Location: login/login.php?fallo=2"); // Redirigir a la página protegida
        }
    }
    else{
        header("Location: login/login.php?fallo=2"); // Redirigir a la página protegida
    }

?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Deportes al Aire Libre</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="global.css">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</head>
<body>
    <!-- Header -->
    <?php 
      include("./components/header.php");
    ?>
    <!-- Slider main container -->
  <div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide">
        <img src="media/1.jpeg" alt="" />
      </div>
      <div class="swiper-slide">
        <img src="media/2.jpeg" alt="" />
      </div>
      <div class="swiper-slide">
        <img src="media/1.jpeg" alt="" />
      </div>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>

    <!-- If we need scrollbar -->
    <div class="swiper-scrollbar"></div>
  </div>


        <!-- Product Cards (Responsive) -->
<section class="container my-4">
    <div class="row">
        <!-- Card Example (Repeat as needed) -->
        <?php
        $cardsProductos->generarCardsProductos($con);
        ?>
        <!-- Añadir más tarjetas aquí -->
    </div>
</section>


    <!-- Footer -->
<footer class="footer">
    <div class="container text-center">
        <h5>Contáctanos</h5>
        <div class="row justify-content-center">
           
            <div class="col-lg-3 col-md-3 col-6 mb-4">
                <a href="https://www.instagram.com/alejogonzaleez/" target="_blank" class="footer-link">
                    <i class="fab fa-instagram fa-3x"></i>
                    <p class="mt-2">@alejogonzaleez</p>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-6 mb-4">
                <a href="https://www.instagram.com/soyfrandri/" target="_blank" class="footer-link">
                    <i class="fab fa-instagram fa-3x"></i>
                    <p class="mt-2">@soyfrandri</p>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-6 mb-4">
                <a href="https://www.instagram.com/_thinkabout.nay_/" target="_blank" class="footer-link">
                    <i class="fab fa-instagram fa-3x"></i>
                    <p class="mt-2">@_thinkabout.nay_</p>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-6 mb-4">
                <a href="https://www.instagram.com/franco_ic_/" target="_blank" class="footer-link">
                    <i class="fab fa-instagram fa-3x"></i>
                    <p class="mt-2">@franco_ic_</p>
                </a>
            </div>
        </div>
    </div>
</footer>




</body>
  <script src="scripts/logica.js"></script>
</html>

<!--
    <table>
        <tr>
            <th>id</th>
            <th>nombre</th>
            <th>contraseña</th>
            <th>email</th>
        </tr>
        <?php
            foreach($response as $row){
                $id = $row['idUsuario'];
                $nombre = $row['nombre'];
                $contraseña = $row['contraseña'];
                $email = $row['email'];
        ?>
        <tr>
            <th><?php echo $id;?></th>
            <th><?php echo $nombre;?></th>
            <th><?php echo $contraseña;?></th>
            <th><?php echo $email;?></th>
        </tr>
        <?php
            }
        ?>
    </table>






    
-->




<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Carrito de Compras</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="cart-items">
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <strong>Total:</strong>
                    <span id="total-amount">0.00 $</span>
                </div>
            </div>
            <div class="modal-footer">
                <form id="formProductos" action="scripts/procesarPedido.php" method="POST">
                    <input type="hidden" id="productos" name="productos">
                    <button type="button" onclick="enviarProductos()">Enviar Productos</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
