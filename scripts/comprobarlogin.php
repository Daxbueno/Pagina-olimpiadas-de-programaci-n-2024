<?php
// auth.php
session_start();

include("../db/db.php");
$db = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Conectarse a la base de datos
    $con = $db->conectar();

    // Verificar las credenciales del usuario sin usar consultas preparadas
    $sql = $con->prepare("SELECT * FROM usuarios WHERE email='$email' AND contraseña='$contraseña'");
    $sql->execute();
    $response = $sql->fetchAll(PDO::FETCH_ASSOC);

    if ($response) {
        // Las credenciales son válidas, iniciar sesión
        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $email;
        header("Location: ../index.php"); // Redirigir a la página protegida
        exit();
    } else {
        header("Location: ../login.php?fallo=1"); // Redirigir a la página protegida
    }

    mysqli_close($con);
}
?>
