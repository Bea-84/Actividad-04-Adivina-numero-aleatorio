<?php
//Iniciamos session
session_start();

// Verificamos si ya tenemos un número aleatorio en la sesión
if (!isset($_SESSION['numeroSecreto'])) {
    // Si no hay, generamos un nuevo número aleatorio
    $_SESSION['numeroSecreto'] = rand(1, 100); // Puedes ajustar el rango según tus preferencias
}

// El numero random se almacena aquí
$numeroSecreto = $_SESSION['numeroSecreto'];

// Comprobamos el número ingresado por el usuario
if (isset($_GET['numero'])) {
    $numeroUsuario = intval($_GET['numero']);

    if ($numeroUsuario < $numeroSecreto) {
        echo "Has dicho $numeroUsuario. El número secreto es más grande.";
    } elseif ($numeroUsuario > $numeroSecreto) {
        echo "Has dicho $numeroUsuario. El número secreto es más pequeño.";
    } else {
        echo "¡Has acertado! El número secreto es $numeroSecreto. ¡Felicidades!";
        // Borramos el número secreto almacenado en la sesión para reiniciar el juego
        unset($_SESSION['numeroSecreto']);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Adivina el número</title>
</head>
<body>
    <h1>Adivina el número</h1>
    <p>Intenta adivinar un número entre 1 y 100.</p>
    <form method="get" action=".">
        <input type="number" name="numero">
        <input type="submit" value="Adivinar">
    </form>
</body>
</html>