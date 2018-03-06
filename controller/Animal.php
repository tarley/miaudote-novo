<?php

class Animal {

    public function cadastrarAnimal($p_) {
       require_once "Conexao.php";
       
       $sql = "";
       
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
<<<<<<< HEAD
                SET ADOTADO = 'T'
=======
                SET ADOTADO = 'T',
                    DAT_ADOCAO = NOW()
>>>>>>> 050a0ede6bd2e2fb512c0ce8a7fe65f5eb89a465
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
    
    public function editarAnimal($id) {
        require_once "Conexao.php";
        
        
        
        $conn->close();
    }
    
    
}

?>