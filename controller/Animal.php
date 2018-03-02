<?php

class Animal {

    public function cadastrarAnimal() {
       require_once "Conexao.php";
       
       
       $conn->close();
    }
    
    public function excluirAnimal($id) {
        require_once "Conexao.php";
        
        $sql = "
                UPDATE ANIMAL
                SET EXCLUIDO = 'T'
                WHERE COD_ANIMAL = '$id'
        ";
        
        if ($conn->query($sql) === true) {
            return array("mensagem" => SUCESSO_ANIMAL_EXCLUIDO,
                        "sucesso" => true);
        } else {
             return array("mensagem" => ERRO_ANIMAL_EXCLUIDO."Erro:".$conn->error,
                          "sucesso" => false);
        }
        
        $conn->close();
    }
    
    public function adotarAnimal($id) {
        require_once "Conexao.php";
        
        $sql ="
                UPDATE ANIMAL
                SET ADOTADO = 'T'
                WHERE COD_ANIMAL = '$id'
        ";
        
        if ($conn->query($sql) === true) {
            return array("mensagem" => SUCESSO_ANIMAL_ADOTADO,
                        "sucesso" => true);
        } else {
            return array("mensagem" => ERRO_ANIMAL_ADOTADO."Erro:".$conn->error,
                        "sucesso" => false);
        }
        
        $conn->close();
    }
    
    
}

?>