<?php
$usuarios_registrados = [
    ["usuario" => "usuario1", "contrasena" => "contrasena1"],
    ["usuario" => "usuario2", "contrasena" => "contrasena2"],
    ["usuario" => "usuario3", "contrasena" => "contrasena3"]
];

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    foreach ($usuarios_registrados as $usuario_registrado) {
        if ($usuario == $usuario_registrado["usuario"] && $contrasena == $usuario_registrado["contrasena"]) {
            $mensaje = "Inicio de sesión exitoso!";
            break;
        } else {
            $mensaje = "Nombre de usuario o contraseña incorrectos.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
</head>
<body>
    <div class="container">
        <h1>Inicio de Sesión</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required>
            <input type="submit" value="Iniciar Sesión">
        </form>
        <p><?php echo $mensaje; ?></p>
    </div>
</body>
</html>