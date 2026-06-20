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

$letraDigitada = "";

if(isset($_POST["letra"])){
    $letraDigitada = strtoupper($_POST["letra"]);
}

$letras = str_split($palavra);

?>

<h1>Jogo da Forca</h1>

<div class="forca">

<?php

foreach($letras as $letra){

    if($letra == $letraDigitada){
        echo $letra . " ";
    }else{
        echo "_ ";
    }

}

?>

</div>

<form method="POST">
    <input type="text" name="letra" maxlength="1">
    <button type="submit">Chutar</button>
</form>

</body>
</html>