<?php
require_once "../controller/Usuario.php";
header("Content-type: application/json");

$Usuario = new Usuario();

$acao = $_GET["acao"];
if($acao == "CriarUsuario"){
    $NomeUsuario = "Daniel Torres";
    $Email = "daniel@gmail.com";
    $Senha = "123";
    $SenhaRepetida = "123";
    $TipoUsuario = "A";

    echo json_encode($Usuario->CriarUsuario($NomeUsuario, $Email, $TipoUsuario, $Senha, $SenhaRepetida));
}
