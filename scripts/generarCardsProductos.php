<?php

class CardsProductos {
  public function generarCardsProductos($con) {
    $sql = $con->prepare("SELECT * FROM productos");
    $sql->execute();
    $response = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($response as $row) { ?>
      <div class="card-product">
        <div class="card-product-img">
          <img src="<?php echo htmlspecialchars($row['imagen']); ?>"/>
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
            <botton class="boton" data-price="<?php echo htmlspecialchars($row['precio']); ?>" 
            data-id="<?php echo htmlspecialchars($row['idProducto']); ?>">Comprar</botton>
          </div>
        </div>
      </div>
    <?php }
  }
}

?>
