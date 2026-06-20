<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Jogo da Forca</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

$palavra = "CASAS";

$letras = str_split($palavra);

?>

<h1>Jogo da Forca</h1>

<div class="forca">

<?php
foreach($letras as $letra){
    echo "_ ";
}
?>

</div>

</body>
</html>