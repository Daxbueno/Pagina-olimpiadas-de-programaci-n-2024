<?php

include("db/db.php");

$db = new Database();

$con = $db->conectar();

$sql = $con->prepare("select * from usuarios");

$sql->execute();

$response = $sql->fetchAll(PDO::FETCH_ASSOC);

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="global.css">
    
</head>
<body>
    <!-- Header -->
    <header class="container-fluid header">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="scripts/logout.php" class="d-flex align-items-center">
                <img src="media/nadia.jpeg" alt="Logo" class="header-logo">
            </a>
            <form class="form-inline mx-auto position-relative">
                <i class="fas fa-search search-icon"></i>
                <input class="form-control" type="search" placeholder="Buscar productos" aria-label="Buscar">
            </form> 
            <a href="#" class="btn btn">
                <i class="fas fa-shopping-cart fa-2x"></i>
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <div class="content">
        <!-- Carousel -->
        <div id="sportsCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#sportsCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#sportsCarousel" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="media/1.jpeg" class="d-block w-100" alt="Deporte 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Deporte al Aire Libre 1</h5>
                        <p>Descripción del deporte 1.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="media/2.jpeg" class="d-block w-100" alt="Deporte 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Deporte al Aire Libre 2</h5>
                        <p>Descripción del deporte 2.</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#sportsCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#sportsCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>

        <!-- Product Cards (Responsive) -->
<section class="container my-4">
    <div class="row">
        <!-- Card Example (Repeat as needed) -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="media/football.jpeg" class="card-img-top" alt="Producto 1">
                <div class="card-body">
                    <h5 class="card-title">Producto 1</h5>
                    <p class="card-text">Descripción breve del producto 1.</p>
                    <p>$4 USD.</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-primary" data-price="4">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="media/tenis.jpeg" class="card-img-top" alt="Producto 2">
                <div class="card-body">
                    <h5 class="card-title">Producto 2</h5>
                    <p class="card-text">Descripción breve del producto 2.</p>
                    <p>$2 USD.</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-primary" data-price="2">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="media/hockey.jpeg" class="card-img-top" alt="Producto 3">
                <div class="card-body">
                    <h5 class="card-title">Producto 3</h5>
                    <p class="card-text">Descripción breve del producto 3.</p>
                    <p>$5 USD.</p>
                    <div class="text-center">
                        <a href="#" class="btn btn-primary" data-price="5">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
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

<!-- Modal del Carrito -->
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
                    <!-- Los productos del carrito se insertarán aquí -->
                </div>
                <div class="d-flex justify-content-between mt-3">
                    <strong>Total:</strong>
                    <span id="total-amount">0.00 $</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Pagar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="logica.js"></script>
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