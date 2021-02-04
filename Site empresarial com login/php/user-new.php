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
if(!isset($_POST["usuario"])) {
    require_once "user-new-form.php";
} else {
    $usuario = $_POST["usuario"] ?? null;
    $nome = $_POST["name"] ?? null;
    $senha1 = $_POST["password"] ?? null;
    $senha2 = $_POST["password1"] ?? null;
    if($senha1 === $senha2) {
        if(empty($usuario) || empty($nome)) {
            echo "Todos os campos são obrigatórios, por favor repita o processo.";
        } else {
            $senha = gerarHash($senha1);
            $q = "INSERT INTO usuarios (usuario, nome, senha, tipo) VALUES ('$usuario', '$nome', '$senha', 'Visitante')";
            if($banco->query($q)) {
                echo "Usuario $nome cadastrado com sucesso!";
            } else {
                echo "Falha no cadastro.";
            }
        }
    } else {
        echo "As senhas não coincidem, por favor repita o processo.";
    }
}
echo voltar();
?>
</body>
</html>