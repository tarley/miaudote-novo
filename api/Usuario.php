<?php
require_once "../controller/Usuario.php";
header("Content-type: application/json");

$Usuario = new Usuario();

$acao = $_GET["acao"];
if($acao == "CriarUsuario"){
    // $NomeUsuario = $_POST["nomeUsuario"];
    // $Email = $_POST["email"];
    // $Senha = $_POST["senha"];
    // $SenhaRepetida = $_POST["confirmacaoSenha"];
    // $TipoUsuario = "C";

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

if($acao == "DeletarUsuario"){
    $usuarioPK = $_GET["COD_USUARIO"];
    echo json_encode($Usuario->DeletarUsuario($usuarioPK));
}

if($acao == "DeletarUsuario"){
    $usuarioPK = $_GET["COD_USUARIO"];
    echo json_encode($Usuario->DeletarUsuario($usuarioPK));
}
