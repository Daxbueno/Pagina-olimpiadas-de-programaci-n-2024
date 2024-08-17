<?php

ob_start(); // Inicia el buffer de salida

session_start();

include("db.php");
$db = new Database();
$con = $db->conectar();

$ID = $_POST['ID'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];

if (($_SERVER["REQUEST_METHOD"] == "POST") && ($ID == -1)) {
  $email = $_POST['email'];
  $sql = $con->prepare("SELECT *
          FROM usuarios 
          WHERE email='$email'");
  $response = $sql->fetchAll(PDO::FETCH_ASSOC);
  
  if ($response) {
    $_SESSION["email"] = $email;
    header("Location: formulario.php?fallo=1");
    exit();
  }
}
if (isset($_GET["Eliminar"])){
    $Eliminar = $_GET["Eliminar"];
}
else{
    $Eliminar = -1;
}
if ($perfilguardado == ""){
  $perfilguardado = "predefinido.jpg";
}


// Si no hay una ID, redirigimos a login.php
//header("Location: login.php");
ob_end_flush(); // Liberar el buffer de salida antes de redirigir


echo htmlspecialchars($_POST['nombre']);print(" ");
print("<br> Su E-mail es: ");
echo htmlspecialchars($_POST['email']);
echo('La id deberia estar acaaa '.$ID);


if (!$conexion) {
    die("la conexion fallo: ". mysqli_connect_error());
}
if ($Eliminar==1){
    echo($ID);
    //$consulta = "DELETE FROM alunos WHERE ID = $ID";
    $consulta ="DELETE FROM usuarios WHERE idUsuarios = '$ID';";
 }
else{
    $consulta = "INSERT INTO usuarios(nombre, email, contraseña) VALUES ('$nombre', '$email', '$contraseña')";
}
$resultado = mysqli_query($conexion, $consulta);
echo ($consulta);

if (!$resultado){
    die("La consulta fallo: " . mysqli_error($conexion));
}
else{
    echo "<br> El registro a sido actualizado de forma correcta";
}

echo '<html>
      <head> <title>Exito</title> </head>
      <body>
        <br>
        <form action="index.php" method="post">
            <input type="submit" value="Volver">
      </body>
      </html>';
      
mysqli_close($conexion);
?>