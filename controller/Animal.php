<?php
require_once "../enum/EnumAnimal.php";
class Animal {

    public function cadastrarAnimal($p_NomeAnimal, $p_DesAnimal, $p_IdadeAnimal, $p_PorteAnimal, $p_Sexo, $p_Adotado, $p_Excluido, $p_DatAdocao, $p_Local, $p_Medicamento, $p_Cidade, $p_Instituicao, $p_Especie ) {
       require_once "Conexao.php";
       
       $Animal = new Usuario();
       
       $erro = false;
       $mensagem = null;
       
       if(empty($p_NomeAnimal)) {
           $erro = true;
           $mensagem = ERRO_NOME_OBRIGATORIO;
       }
       elseif(empty($p_IdadeAnimal)) {
           $erro = true;
           $mensagem = ERRO_IDADE_OBRIGATORIO;
       }
       elseif(empty($p_PorteAnimal)) {
           $erro = true;
           $mensagem = ERRO_PORTE_OBRIGATORIO;
       }
       elseif(empty($p_Sexo)) {
           $erro = true;
           $mensagem = ERRO_SEXO_OBRIGATORIO;
       }
       elseif(empty($p_Local)) {
           $erro = true;
           $mensagem = ERRO_LOCAL_OBRIGATORIO;
       }
       elseif(empty($p_Cidade)) {
           $erro = true;
           $mensagem = ERRO_CIDADE_OBRIGATORIO;
       }
       elseif(empty($p_Instituicao)) {
           $erro = true;
           $mensagem = ERRO_INSTITUICAO_OBRIGATORIO;
       }
       elseif(empty($p_Especie)) {
           $erro = true;
           $mensagem = ERRO_ESPECIE_OBRIGATORIO;
       }
       
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