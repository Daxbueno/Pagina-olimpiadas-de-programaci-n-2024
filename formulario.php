<?php
    include("db.php");
    $db = new Database();
    $con = $db->conectar();
    $id= -1;
    $pagina = "login";
echo '<head>
<title>Personalizacion de usuario</title>
<style>
    div{
        border: 1px solid #090909;
        margin: auto;
        margin-top: 100px;
        text-align: center;
        background-color: ghostwhite;
        width: 50%;
    }
    input{
        width: 94%;
    }
    body{
        margin: 0%;
        background-color: #FFE4B5;
    }
</style>
</head>    
<body>';
    echo '<h1 style="text-align: center; margin-top: 20px;">¡¡Registrate!!</h1>';

   echo '
    <div>
    <form action="manejoBD.php" method="post" enctype="multipart/form-data">
            <p>Nombre de usuario:<input name="nombre" type="text" required value = ""/> </p>
            <p>E-mail:<br><input name="email" type="email" required value = ""> </p>
            <p>Contraseña: <input name="contraseña" type="password" required value=""></p>
            <input name="ID" type="hidden" value="'.$id.'">
                 <input type="submit" value="Subir datos" name="submit">
    <p></p>
</form>
</div>';
if (isset($_GET['fallo'])){
    echo '<p style="color:red; font-size: xx-large; text-align:center;">El mail esta tomado</p>';
}
echo '</body>';
?>