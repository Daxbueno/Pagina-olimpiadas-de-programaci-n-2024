<?php

include("db.php");

$db = new Database();

$con = $db->conectar();

$sql = $con->prepare("select * from usuarios");

$sql->execute();

$response = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>