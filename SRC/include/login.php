<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    session_start();

    if ($username === $_SESSION['username'] && $password === $_SESSION['password']) {
        echo "Inicio de sesión exitoso!";
    } else {
        echo "Nombre de usuario o contraseña incorrectos";
    }
}
?>
<nav>
      <a href="index.php">Registrarse</a>
      <a href="./SRC/include/login.php">Iniciar Sesion</a>
   
    </nav>
<form method="POST">
    <label for="username">Nombre de usuario:</label><br>
    <input type="text" id="username" name="username"><br>
    <label for="password">Contraseña:</label><br>
    <input type="password" id="password" name="password"><br>
    <input type="submit" value="Iniciar sesión">
</form>
</body>
</html>