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

if($acao == "AlterarInstituicao"){
   $InstituicaoPK = 3;
   $NomeInstituicao =  "Teste Protetor";
   $Telefone = "(31)5555-5555";
   $Email = "fdsfsldfdfdf@gmail.com";
   $TipoInstituicao = "P"; 
    echo json_encode($Instituicao->AlterarInstituicao($InstituicaoPK, $NomeInstituicao, $Telefone, $Email, $TipoInstituicao));
}

if($acao == "GetInstituicao"){
    $pagina = $_GET["Pagina"];
    echo json_encode($Instituicao->GetInstituicao($pagina));
}