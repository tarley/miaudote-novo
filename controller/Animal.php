<?php
require_once "../enum/EnumAnimal.php";
header("Content-type: application/json");


class Animal {

    public function cadastrarAnimal($p_NomeAnimal, $p_DesObservacao, $p_IdadeAnimal, $p_PorteAnimal, $p_Sexo, $p_Instituicao, $p_Especie ) {
       require_once "Conexao.php";
       
       $Animal = new Animal();
       
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
        
        
        try {
            $stmt = $conn->prepare("INSERT INTO ANIMAL(NOM_ANIMAL, DES_OBSERVACAO, IND_PORTE_ANIMAL, 
            IND_SEXO_ANIMAL, INSTITUICAO_COD_INSTITUICAO, ESPECIE_COD_ESPECIE, DAT_CADASTRO) 
            VALUES (:nom_animal, :des_observacao, :des_idade, :ind_porte_animal, :ind_sexo_animal, :cod_instituicao, :cod_especie, now())");
        
        
        $stmt->bindParam (':nom_animal', $p_NomeAnimal);
        $stmt->bindParam (':des_observacao', $p_DesObservacao);
        $stmt->bindParam (':des_idade', $p_IdadeAnimal);
        $stmt->bindParam (':ind_porte_animal', $p_PorteAnimal);
        $stmt->bindParam (':ind_sexo_animal', $p_Sexo);
        $stmt->bindParam (':cod_instituicao', $p_Instituicao);
        $stmt->bindParam (':cod_especie', $p_Especie);
        
        $stmt->execute();
        
            return array("mensagem" => SUCESSO_ANIMAL_CRIADO,
                        "sucesso" => true);
        
        } catch(PDOException $e){
                        return array("mensagem" => ERRO_ANIMAL_CRIADO."Erro:".$conn->error,
                          "sucesso" => false);
        }
       
       $conn = null;
    }
    
    public function excluirAnimal($id) {
        require_once "Conexao.php";
        
        $erro = false;
        $mensagem = null;
       
        try{
        $stmt = $conn->prepare("UPDATE ANIMAL
                SET IND_EXCLUIDO = 'T'
                WHERE COD_ANIMAL = :id");
        
        $stmt->bindParam(':id', $id);
        
        $stmt->execute();
        
        
            return array("mensagem" => SUCESSO_ANIMAL_EXCLUIDO,
                        "sucesso" => true);
                        
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            
             return array("mensagem" => ERRO_ANIMAL_EXCLUIDO."Erro:".$conn->error,
                          "sucesso" => false);
        }
        
        $conn = null;
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
    
    public function BuscarTodos() {
        
    }
    
    public function BuscarPorId($id) {
        
    }
    
    public function BuscarAdotados() {
        
    }
    
    
    
}

?>