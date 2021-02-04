<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../_css/style.css">
    <link rel="stylesheet" href="../_css/php.css">
    <link rel="stylesheet" href="../_css/responsive.css">
    <title>Pearson & Hardman</title>
    <link rel="shortcut icon" href="../_imagens/logo.png">
    <style>
        body {
            background-image: url("../_imagens/bgr-papel.jpg");
        }
        h2 {
            font-family: sans-serif;
        }
    </style>
    <?php
        require_once "banco.php";
        require_once "login.php";
    ?>
</head>
<script src="_javascript/funcoes.js"></script>
<body>
    <nav id="menu">
        <ul>
            <li><a href="../index.html"><b>HOME</b></a></li>
            <li><a href="../quem_somos.html" onmouseover="mudafoto('/.._imagens/quem_somos.png')" onmouseout="mudafoto('../_imagens/logo.png')"><b>QUEM SOMOS</b></a></li>
            <li><img id="logo" src="../_imagens/logo.png"></li>
            <li><a href="../action.html" onmouseover="mudafoto('../_imagens/action.png')" onmouseout="mudafoto('../_imagens/logo.png')"><b>ÁREAS DE ATUAÇÃO</b></a></li>
            <li><a href="../contato.html" onmouseover="mudafoto('../_imagens/contato.png')" onmouseout="mudafoto('../_imagens/logo.png')"><b>CONTATO</a></b></li>
        </ul>
</nav>
<h2>Usuários cadastrados</h2>
<table id="usuarios">

<?php
$q = "SELECT id, nome, tipo FROM usuarios";
$busca = $banco->query($q);
while($reg = $busca->fetch_object()) {
    echo "<tr><td>$reg->id <td>$reg->nome <td> $reg->tipo";
}
echo voltar();
?>
</table>
</body>
</html>