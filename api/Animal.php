<?php
require_once "../controller/Animal.php";
header("Content-type: application/json");

$Animal = new Animal();

$acao = $_GET["acao"];
if($acao == "CadastrarAnimal") {
    $p_NomeAnimal = "Zezinho"; 
    // $p_DesAnimal = "Animal";
    $p_IdadeAnimal = "3";
    $p_PorteAnimal = "1";
    $p_Sexo = "1";
    $p_Local = "Belo Horizonte";
    // $p_Medicamento = "Teste";
    $p_DesAnimal = "";
    $p_Medicamento = "";
    $p_Cidade = "1";
    $p_Instituicao = "1";
    $p_Especie = "1";
    
    echo json_encode($Animal->cadastrarAnimal($p_NomeAnimal, $p_DesAnimal, $p_IdadeAnimal, $p_PorteAnimal, $p_Sexo, $p_Local, $p_Medicamento, $p_Cidade, $p_Instituicao, $p_Especie));
}

if($acao == "ExcluirAnimal") {
    $id = "6";
    
    echo json_encode($Animal->excluirAnimal($id));
}

if($acao == "AdotarAnimal") {
    $id = "6";
    
    echo json_encode($Animal->excluirAnimal($id));
}

?>