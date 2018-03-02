<?php

class Animal {

    public function cadastrarAnimal() {
       require_once "Conexao.php";
       
        $sql = "INSERT INTO `USUARIO`(`DES_EMAIL`, `DES_SENHA`, `DES_TIPO_USUARIO`, `NOM_USUARIO`) 
        VALUES ('$p_EmailUsuario','$senha','$p_TipoUsuario','$p_NomeUsuario')";
        if ($conn->query($sql) === true) {
            return array("mensagem" => SUCESSO_USUARIO_CRIADO,
                        "sucesso" => true);
        } else {
             return array("mensagem" => ERRO_USUARIO_CRIADO."Erro:".$conn->error,
                          "sucesso" => false);
        }
       
       $conn->close();
    }
    
    public function excluirAnimal($id) {
        require_once "Conexao.php";
        
        $sql = "
                UPDATE ANIMAL
                SET EXCLUIDO = 'T'
                WHERE COD_ANIMAL = $id
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
                WHERE COD_ANIMAL = $id
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