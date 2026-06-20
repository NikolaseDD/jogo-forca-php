<?php
session_start();

$palavra = "CASAS";
$maxErros = 6;

if (!isset($_SESSION['chutes'])) {
    $_SESSION['chutes'] = [];
}

if (isset($_POST['reiniciar'])) {
    $_SESSION['chutes'] = [];
}

if (isset($_POST['letra'])) {

    $letra = strtoupper(trim($_POST['letra']));

    if (
        !empty($letra) &&
        !in_array($letra, $_SESSION['chutes'])
    ) {
        $_SESSION['chutes'][] = $letra;
    }
}

$letras = str_split($palavra);

$erros = [];

foreach ($_SESSION['chutes'] as $chute) {

    if (!in_array($chute, $letras)) {
        $erros[] = $chute;
    }
}

$tentativasRestantes = $maxErros - count($erros);

$venceu = true;

foreach ($letras as $letra) {

    if (!in_array($letra, $_SESSION['chutes'])) {
        $venceu = false;
        break;
    }
}

$perdeu = $tentativasRestantes <= 0;
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

<?php if (!$venceu && !$perdeu) { ?>

<form method="POST">
    <input type="text" name="letra" maxlength="1" required>
    <button type="submit">Chutar</button>
</form>

<?php } ?>

<h3>Letras digitadas:</h3>

<p>
<?php
foreach ($_SESSION['chutes'] as $chute) {
    echo $chute . " ";
}
?>
</p>

<h3>Erros:</h3>

<p>
<?php
foreach ($erros as $erro) {
    echo $erro . " ";
}
?>
</p>

<h3>Tentativas restantes:</h3>

<p>
<?php echo $tentativasRestantes; ?>
</p>

<?php if ($venceu) { ?>
    <h2>🏆 Você venceu!</h2>
<?php } ?>

<?php if ($perdeu) { ?>
    <h2>💀 Você perdeu!</h2>
    <p>A palavra era: <strong><?php echo $palavra; ?></strong></p>
<?php } ?>

<form method="POST">
    <button type="submit" name="reiniciar">
        Reiniciar Jogo
    </button>
</form>

</body>
</html>