<?php
require_once "../controller/Auth.php";
header("Content-type: application/json");

$Auth = new Auth();

$acao = $_GET["acao"];
if($acao == "CriarSessao"){
    $email = "henrique@gmail.com";
    $senha = "123";
    
    echo json_encode($Auth->CriarSessao($email, $senha));
}

if($acao == "ChecarSessao"){
    echo json_encode($Auth->ChecarSessao());
}

if($acao == "EncerrarSessao"){
    echo json_encode($Auth->EncerrarSessao());
}