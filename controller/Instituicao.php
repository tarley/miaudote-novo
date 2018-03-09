<?php
require_once "../enum/EnumInstituicao.php";

class Instituicao{
    public function CriarInstituicao($p_NomeInstituicao, $p_Telefone, $p_Email, $p_TipoInstituicao){
        require_once "Conexao.php";
        $erro = false;
        $mensagem = null;
        
        if(empty($p_NomeInstituicao)){
            $erro = true;
            $mensagem = ERRO_NOME_INSTITUICAO;
        }elseif(empty($p_Telefone)){
            $erro = true;
            $mensagem = NUM_TELEFONE;
        }elseif(empty($p_Email)){
            $erro = true;
            $mensagem = ERRO_EMAIL_OBRIGATORIO;
        }elseif(empty($p_TipoInstituicao)){
            $erro = true;
            $mensagem = ERRO_TIPO_OBRIGATORIO;
        }
        
        if($erro){
            return array("sucesso"=>false,
            "mensagem"=>$mensagem);
        }
        
        try{
            $excluida = InstituicaoNaoExcluida;
            $stmt = $conn->prepare("INSERT INTO `miaudote`.`INSTITUICAO` (`NOM_INSTITUICAO`, `NUM_TELEFONE`, `DES_TIPO_INSTITUICAO`, `DES_EMAIL`, `IND_EXCLUIDO`) VALUES (:nome, :telefone, :tipo, :email, :excluido)");
            $stmt->bindParam(':nome', $p_NomeInstituicao);
            $stmt->bindParam(':telefone', $p_Telefone);
            $stmt->bindParam(':tipo', $p_TipoInstituicao);
            $stmt->bindParam(':email', $p_Email);
            $stmt->bindParam(':excluido', $excluida);
            $stmt->execute();
            
            return array("mensagem" => SUCESSO_INSTITUICAO_CADASTRADA,
                        "sucesso" => true);
        }catch(Exception $ex){
            return array("mensagem" => ERRO_INSTITUICAO_CADASTRADA,
                        "sucesso" => false);
        }
        
        $conn = null;
    }
    
    public function ExcluirInstituicao($p_InstituicaoPK){
        require_once "Conexao.php";
        
        try{
            $excluida = InstituicaoExcluida;
            $stmt = $conn->prepare("UPDATE  `miaudote`.`INSTITUICAO` SET  `IND_EXCLUIDO` =  :excluido WHERE  `INSTITUICAO`.`COD_INSTITUICAO` = :CodInstituicao");
            $stmt->bindParam(':excluido', $excluida);
            $stmt->bindParam(':CodInstituicao', $p_InstituicaoPK);
            $stmt->execute();
            
            return array("mensagem" => SUCESSO_INSTITUICAO_EXCLUIDA,
                        "sucesso" => true);
        }catch(Exception $ex){
            return array("mensagem" => ERRO_INSTITUICAO_EXCLUIDA,
                        "sucesso" => false);
        }
        $conn = null;
    }
}
    