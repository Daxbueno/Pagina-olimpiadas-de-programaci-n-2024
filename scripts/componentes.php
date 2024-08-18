<?php

class Componentes {

  public function getHeader() {
    ?>
    <header class="header">
      <div class="content-header">
        <a href="#" class="container-logo">
          <img src="media/logo.png" alt="Logo" class="logo">
        </a>
        <form class="buscador">
         <svg width="20" height="20" viewBox="0 0 256 256"><path fill="#000000" d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32M40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72"/></svg>
          <input class="form-control" type="search" placeholder="Buscar productos" aria-label="Buscar">
       </form> 
       <a href="#" class="container-carrito">
          <span id="numero-carrito" class="numero-carrito">0</span>
         <svg  width="30" height="30" viewBox="0 0 24 24"><path fill="#000000" d="M17 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2M1 2v2h2l3.6 7.59l-1.36 2.45c-.15.28-.24.61-.24.96a2 2 0 0 0 2 2h12v-2H7.42a.25.25 0 0 1-.25-.25q0-.075.03-.12L8.1 13h7.45c.75 0 1.41-.42 1.75-1.03l3.58-6.47c.07-.16.12-.33.12-.5a1 1 0 0 0-1-1H5.21l-.94-2M7 18c-1.11 0-2 .89-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2"/></svg>
       </a>
      </div>
    </header> 
    <?php
  }

  public function getFooter() {
    ?>
    <footer class="footer">
      <div class="">
        <h5>Contáctanos</h5>
        <div class="">     
          <div>
            <a href="https://www.instagram.com/alejogonzaleez/" target="_blank" class="footer-link">
              <p>@alejogonzaleez</p>
            </a>
          </div>
          <div>
            <a href="https://www.instagram.com/soyfrandri/" target="_blank" class="footer-link">
              <p>@soyfrandri</p>
            </a>
          </div>
          <div>
            <a href="https://www.instagram.com/_thinkabout.nay_/" target="_blank" class="footer-link">
              <p>@_thinkabout.nay_</p>
            </a>
          </div>
          <div>
            <a href="https://www.instagram.com/franco_ic_/" target="_blank" class="footer-link">
              <p>@franco_ic_</p>
            </a>
          </div>
        </div>
      </div>
    </footer>
    <?php
  }

  public function getSlider() {
    ?>
    <div class="swiper">
      <div class="swiper-wrapper">
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
      <div class="swiper-pagination"></div>

      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-scrollbar"></div>
    </div>
    <?php
  }
  public function getCardProducto($row) {
    ?>
      <div class="card-product">
        <div class="card-product-img">
          <img src="media/hockey.jpeg"/>
        </div>
        <div class="card-product-info">
          <div>
            <h3 class="title"><?php echo htmlspecialchars($row['nombre']); ?></h3>
            <h5 class="text-caracteristicas">caracteristicas</h5>
            <p class="descripcion"><?php echo htmlspecialchars($row['descripcion']); ?></p>
           
          </div>
          <div class="container-precio">
            <h5 class="text-precio">Precio</h5>
            <p class="precio"><?php echo htmlspecialchars($row['precio']); ?> USD</p>
            <botton class="boton" data-name="<?php echo htmlspecialchars($row['nombre']); ?>" data-price="<?php echo htmlspecialchars($row['precio']); ?>" 
            data-id="<?php echo htmlspecialchars($row['idProducto']); ?>">Añadir al carrito</botton>
          </div>
        </div>
      </div>
    <?php
  }
}

?>
