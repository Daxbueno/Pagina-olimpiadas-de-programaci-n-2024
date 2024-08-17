<?php
    include("db.php");
    $db = new Database();
    $con = $db->conectar();
    $email ="";
    $contraseña ="";

echo '<!DOCTYPE html>
<html>
<head>
    <title>Logeo</title>
    <link rel="stylesheet" type="text/css" href="Style/estilos1.css">   
</head>
    <body>
        <div style="margin-top:10%">
            <form method="post" enctype="multipart/form-data" action="comprobarlogin.php">
                <p>E-mail <br><input name="email" id="email" type="email" required placeholder="email@email.com"></p>
                <p>Contraseña <br><input name="contraseña" id="contraseña" type="password" required></p>
                <input type="submit">
                <p>¿No tienes una cuenta aun? <a href="formulario.php">¡Registrate!</a></p>
            </form>';
            
            if(isset($_GET['fallo'])){
                if($_GET['fallo']==1){
                echo '<p style="color:red;">Contraseña o mail incorrectos</p>';}
                if($_GET['fallo']==2){
                    echo '<p style="color:crimson;">No se inicio sesión</p>';
                }
            }
    echo '</div>
    </body>
</html>'
?>