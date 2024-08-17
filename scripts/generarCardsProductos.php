<?php

class CardsProductos {
  public function generarCardsProductos($con) {
    $sql = $con->prepare("SELECT * FROM productos");
    $sql->execute();
    $response = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach ($response as $row) { ?>
      <div class="col-md-4 mb-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($row['nombre']); ?></h5>
            <p class="card-text"><?php echo htmlspecialchars($row['descripcion']); ?></p>
            <p><?php echo htmlspecialchars($row['precio']); ?> USD</p>
            <div class="text-center">
              <a class="btn btn-primary" data-price="<?php echo htmlspecialchars($row['precio']); ?>">Comprar</a>
            </div>
          </div>
        </div>
      </div>
    <?php }
  }
}

?>
