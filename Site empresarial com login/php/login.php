<?php

session_start();

if(!isset($_SESSION["user"])) {
    $_SESSION["id"] = "";
    $_SESSION["user"] = "";
    $_SESSION["nome"] = "";
    $_SESSION["tipo"] = "";
}

function gerarHash($senha) {
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    return $hash;
}

function testarHash($senha, $hash) {
    $ok = password_verify($senha, $hash);
    return $ok;
}

function is_admin() {
    $t = $_SESSION['tipo'] ?? null;
    if(is_null($t)) {
        return false;
    } else {
    if($t == "Advogado") {
        return true;
    } else {
        return false;
        }
    }
}

function logout() {
    unset($_SESSION["user"]);
    unset($_SESSION["nome"]);
    unset($_SESSION["tipo"]);
}

function voltar() {
    return "<a href='index.php'><img id='return' src='../_imagens/return.png'></a>";
}