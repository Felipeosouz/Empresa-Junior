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
        p {
            font-size: 25px;
            font-family: sans-serif;
        }
        img#return {
            margin-top: 10px;
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
<?php
$u = $_POST["user"] ?? null;
$s = $_POST["senha"] ?? null;

if(is_null($u) || is_null($s)) {
    require "user-login-form.php";
} else {
    $q = "SELECT id, usuario, nome, senha, tipo FROM usuarios WHERE usuario = '$u' LIMIT 1";
    $busca = $banco->query($q);
    if(!$busca) {
        echo "Falha na busca!";
    } else {
        if($busca->num_rows > 0) {
            $reg = $busca->fetch_object();
            if(testarHash($s,$reg->senha)) {
                $_SESSION["id"] = $reg->id;
                $_SESSION["user"] = $reg->usuario;
                $_SESSION["nome"] = $reg->nome;
                $_SESSION["tipo"] = $reg->tipo;
                echo "<script>window.location.href = 'index.php';</script>";
            } else {
                echo "Senha incorreta!";
            }
        } else {
            echo "Usuario não encontrado!";
        }
    }
}
echo voltar();
?>

</body>
</html>