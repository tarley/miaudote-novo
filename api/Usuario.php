<?php
require_once "../controller/Usuario.php";
header("Content-type: application/json");

$Usuario = new Usuario();

$acao = $_GET["acao"];
if($acao == "CriarUsuario"){
    $NomeUsuario = "Henrique";
    $Email = "henrique@gmail.com";
    $Senha = "123";
    $SenhaRepetida = "123";
    $TipoUsuario = "A";

    echo json_encode($Usuario->CriarUsuario($NomeUsuario, $Email, $TipoUsuario, $Senha, $SenhaRepetida));
}

if($acao == "GetUsuarios"){
    $pagina = $_GET["Pagina"];
    echo json_encode($Usuario->GetUsuarios($pagina));
}

if($acao == "GetUsuarioPorPK"){
    $usuarioPK = $_GET["COD_USUARIO"];
    echo json_encode($Usuario->GetUsuarioPorPK($usuarioPK));
}
