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
            font-family: sans-serif;
            font-size: 22px;
        }
        a {
            text-decoration: none;
            color: white
        }
        button {
            background-color: #623000;
            margin-right: 5px;
            margin-left: 20px;
            font-size: 18px;
            transition: 0.3s;
        }
        button#botao:hover {
            -webkit-transform: scale(1.2);
        }
        button:hover {
            cursor: pointer;
        }
        form#enviar {
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
if(empty($_SESSION["user"])) {
    echo "<header>";
    echo "<a href='user-login.php'><button>Fazer login</button></a> <p>ou</p> <a href='user-new.php'><button>Cadastre-se</button></a>";
    echo "</header>";
} else {
    echo "<p>Usuário conectado: " . $_SESSION["nome"];
    echo " <button id='botao'><a href='logout.php'>Sair</a></button>";
    echo "<button id='botao'><a href='user-edit.php'>Meus dados<a></button>";
    if(is_admin()) {
        echo "<button id='botao'><a href='user-view.php'>Ver usuários</a></button></p>";
    }
    require "quest.php";
}
unset($msg);
?>
</body>
</html>