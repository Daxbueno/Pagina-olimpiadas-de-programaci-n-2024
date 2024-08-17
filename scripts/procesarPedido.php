<?php
if (isset($_POST['productos'])) {
    $productos = json_decode($_POST['productos'], true);
    foreach ($productos as $producto) {
        echo "Nombre: " . $producto['name'] . "<br>";
        echo "ID: " . $producto['idProducto'] . "<br>";
        echo "Cantidad: " . $producto['quantity'] . "<br>";
        echo "Precio Total: " . $producto['totalPrice'] . " $<br><br>";
    }
} else {
    header("Location: ../login/login.php");
    exit();
}
?>