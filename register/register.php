<?php
    include("../db/db.php");
    $db = new Database();
    $con = $db->conectar();
    $id= -1;
    $pagina = "login";
echo '<head>
<title>Personalizacion de usuario</title>
</head>    
<body>';
    echo '<h1>¡¡Registrate!!</h1>';

   echo '
    <div>
    <form action="../db/manejoBD.php" method="post" enctype="multipart/form-data">
            <p>Nombre de usuario:<input name="nombre" type="text" required value = ""/> </p>
            <p>E-mail:<br><input name="email" type="email" required value = ""> </p>
            <p>Contraseña: <input name="contraseña" type="password" required value=""></p>
            <input name="ID" type="hidden" value="'.$id.'">
                 <input type="submit" value="Subir datos" name="submit">
    <p></p>
</form>
</div>';
if (isset($_GET['fallo'])){
    echo '<p>El mail esta tomado</p>';
}
echo '</body>';
?>