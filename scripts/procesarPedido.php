<?php

if (!isset($_POST['productos'])) {
    header("Location: ../index.php");
    exit();
}
include("../db/db.php");
$db = new Database();
$idUsuario = 2;
$date = getDateForDatabase();
$con = $db->conectar();
$consulta = $con->prepare("INSERT INTO pedidos(idUsuario, fechaPedido) VALUES ('$idUsuario', '$date')");
$consulta->execute();
$consulta = $con->prepare("SELECT max(pedidos.idPedido) as idPedido  FROM pedidos WHERE idUsuario='$idUsuario'");
$consulta->execute();
$response = $consulta->fetchAll(PDO::FETCH_ASSOC);
if ($response) {
    foreach($response as $row){
        $idPedido = $row['idPedido'];
    }
    echo $idPedido;
}

function getDateForDatabase(): string {
    $date_formated = date('Y-m-d H:i:s');
    return $date_formated;
}


$productos = json_decode($_POST['productos'], true);
foreach ($productos as $producto) {
    $name = $producto['name'];
    $idProducto = $producto['idProducto'];
    $cantidad = $producto['quantity'];
}

?>