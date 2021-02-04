<?php
require_once "banco.php";
require_once "login.php";

$msg = $_POST['menssage'];
$id = $_SESSION['id'];

$q = "INSERT INTO mensagens (id_nome, mensagem) VALUES ('$id','$msg')";
$busca = $banco->query($q);
echo "<script>window.location.href = 'index.php';</script>";