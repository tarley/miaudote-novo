<?php
require_once "../controller/Instituicao.php";
require_once "../enum/EnumInstituicao.php";
header("Content-type: application/json");

$Instituicao = new Instituicao();

$acao = $_GET["acao"];
if($acao == "CriarInstituicao"){
    $NomeInstituicao = "Colé instituição";
    $Telefone = "(31)99120-8877";
    $Email = "instituicao@gmail.com";
    $TipoInstituicao = "P";

    echo json_encode($Instituicao->CriarInstituicao($NomeInstituicao, $Telefone, $Email, $TipoInstituicao));
}

if($acao == "ExcluirInstituicao"){
   $InstituicaoPK = 3;
   
    echo json_encode($Instituicao->ExcluirInstituicao($InstituicaoPK));
}