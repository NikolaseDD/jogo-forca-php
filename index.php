<?php
session_start();

$palavra = "CASAS";

if (!isset($_SESSION['chutes'])) {
    $_SESSION['chutes'] = [];
}

if (isset($_POST['letra'])) {

    $letra = strtoupper($_POST['letra']);

    if (!in_array($letra, $_SESSION['chutes'])) {
        $_SESSION['chutes'][] = $letra;
    }
}

$letras = str_split($palavra);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Jogo da Forca</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Jogo da Forca</h1>

    <div class="forca">
        <?php

        foreach ($letras as $letra) {

            if (in_array($letra, $_SESSION['chutes'])) {
                echo $letra . " ";
            } else {
                echo "_ ";
            }

        }

        ?>
    </div>

    <br>

    <form method="POST">
        <input type="text" name="letra" maxlength="1" required>
        <button type="submit">Chutar</button>
    </form>

    <h3>Letras digitadas:</h3>

    <p>
        <?php
        foreach ($_SESSION['chutes'] as $chute) {
            echo $chute . " ";
        }
        ?>
    </p>

</body>
</html>