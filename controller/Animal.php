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
       
       if($erro){
            return array("sucesso"=>false,
            "mensagem"=>$mensagem);
        }
    
       $sql = "
            INSERT INTO `ANIMAL`(`NOM_ANIMAL`, `DES_ANIMAL`, `DES_IDADE`, `IND_PORTE_ANIMAL`, 
            `IND_SEXO_ANIMAL`, `IND_ADOTADO`, `IND_EXCLUIDO`, `DAT_ADOCAO`, `DES_LOCAL`, `DES_MEDICAMENTO`, 
            `CIDADE_COD_CIDADE`, `INSTITUICAO_COD_INSTITUICAO`, `ESPECIE_COD_ESPECIE`) 
            VALUES ($p_NomeAnimal,$p_DesAnimal,$p_IdadeAnimal,$p_PorteAnimal,$p_Sexo,$p_Adotado,$p_Excluido,$p_,$p_DatAdocao,$p_Local,
            $p_Medicamento,$p_Cidade,$p_Instituicao,$p_Especie)
        ";
            
        if ($conn->query($sql) === true) {
            return array("mensagem" => SUCESSO_ANIMAL_CRIADO,
                        "sucesso" => true);
        } else {
             return array("mensagem" => ERRO_ANIMAL_CRIADO."Erro:".$conn->error,
                          "sucesso" => false);
        }
       
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
                SET ADOTADO = 'T',
                    DAT_ADOCAO = NOW()
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
    
    public function editarAnimal($id, $p_NomeAnimal, $p_DesAnimal, $p_IdadeAnimal, $p_PorteAnimal, $p_Sexo, $p_Adotado, $p_Excluido, $p_DatAdocao, $p_Local, $p_Medicamento, $p_Cidade, $p_Instituicao, $p_Especie ) {
        require_once "Conexao.php";
        
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
       
       if($erro){
            return array("sucesso"=>false,
            "mensagem"=>$mensagem);
        }
        
        $sql = "
                UPDATE `ANIMAL` SET `NOM_ANIMAL`=$p_NomeAnimal,`DES_ANIMAL`=$p_DesAnimal,`DES_IDADE`=$p_IdadeAnimal,`IND_PORTE_ANIMAL`=$p_PorteAnimal,
                `IND_SEXO_ANIMAL`=$p_Sexo,
                `DES_LOCAL`=$p_Local,`DES_MEDICAMENTO`=$p_Medicamento,`CIDADE_COD_CIDADE`=$p_Cidade,`INSTITUICAO_COD_INSTITUICAO`=$p_Instituicao,
                `ESPECIE_COD_ESPECIE`=$p_Especie  
                WHERE COD_ANIMAL = $id;
        ";
        
        if ($conn->query($sql) === true) {
            return array("mensagem" => SUCESSO_ANIMAL_ALTERADO,
                        "sucesso" => true);
        } else {
            return array("mensagem" => ERRO_ANIMAL_ALTERADO."Erro:".$conn->error,
                        "sucesso" => false);
        }
         
        $conn->close();
    }
    
    
}

?>