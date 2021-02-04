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
if(!isset($_POST["userupdate"])) {
    require "user-edit-form.php";
} else {
    $usuario = $_POST["userupdate"] ?? null;
    $nome = $_POST["nomeupdate"] ?? null;
    $tipo = $_POST["tipo"] ?? null;
    $senha1 = $_POST["senha1"] ?? null;
    $senha2 = $_POST["senha2"] ?? null;

    $q = "UPDATE usuarios SET usuario = '$usuario', nome = '$nome'";
    if(empty($senha1) || is_null($senha1)) {
        echo "A senha não foi alterada";
    } else {
        if($senha1 === $senha2) {
            $senha =  gerarHash($senha1);
            $q .= ", senha = '$senha'";
        } else {
            echo "As senhas não coincidem, a senha antiga será mantida";
        }
    }
    $q .= " WHERE usuario = '" . $_SESSION["user"] . "'";
    if($busca = $banco->query($q)) {
        logout();
        echo "</br>Por segurança, efetue o <a href='user-login.php'>login</a> novamente";
    } else {
        echo "Não foi possivel atualizar os dados";
    }
}
echo voltar();
?>
</body>
</html>