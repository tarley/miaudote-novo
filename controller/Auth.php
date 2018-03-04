<?php
require_once "../enum/EnumAuth.php";
class Auth{
   
 public function CriarSessao($p_Email, $p_Senha) {
        include "Conexao.php";
        $sql = "SELECT DES_SENHA, DES_TIPO_USUARIO FROM USUARIO WHERE DES_EMAIL='$p_Email'";
 
        $resultado = $conn->query($sql);
 
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $senha = $row["DES_SENHA"];
                $tipo = $row["DES_TIPO_USUARIO"];
            }
        }
        
        if ($senha == sha1($p_Senha)) {
            session_start();
            $_SESSION["email"] = $p_Email;
            $_SESSION["senha"] = $senha;
 
            return array("mensagem" => SUCESSO_LOGIN,
                "sucesso" => true,
                "tipo"=>$tipo);
        } else {
            return array("mensagem" => ERRO_LOGIN,
                "sucesso" => false);
        }
        
        $conn->close();
    }
    
     public function ChecarSessao(){
        require_once "Conexao.php";
        
        session_start();
        $email = $_SESSION["email"];
        $senha = $_SESSION["senha"];
        
        if(empty($email) || empty($senha)){
            return array("sucesso"=>false,
                        "mensagem"=>SESSAO_INVALIDA);
        }

        $sql = "SELECT DES_SENHA, DES_TIPO_USUARIO, NOM_USUARIO, DES_EMAIL FROM USUARIO WHERE DES_EMAIL = '$email'";
        $resultado = $conn->query($sql);
 
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $SenhaCorreta = $row["DES_SENHA"];
                $tipo = $row["DES_TIPO_USUARIO"];
                $email = $row["DES_EMAIL"];
                $nome = $row["NOM_USUARIO"];
            }
        }

        if($senha !== $SenhaCorreta){
            return array("sucesso"=>false,
                        "mensagem"=>SESSAO_INVALIDA);
        }
        
        return array("sucesso"=>true,
                    "data"=>array(
                            "NOM_USUARIO"=>$nome,
                            "DES_EMAIL"=>$email,
                            "TIPO"=>$tipo
                        ));
        $conn->close();
    }
    
    
    public function EncerrarSessao(){
        session_start();
        unset($_SESSION["email"]);
        unset($_SESSION["senha"]);
        
        return array("sucesso"=>true,
                    "mensagem"=>SUCESSO_ENCERRAR_SESSAO);
    }
    
    public function ChecarPermissao($p_PermissaoNecessaria){
        require_once "Auth.php";
        $Auth = new Auth();
        
        $sessao = $Auth->ChecarSessao();
        if(!$sessao["sucesso"]){
            return $sessao;
        }
        
        if($sessao["data"]["tipo"] !== $p_PermissaoNecessaria){
            return array("sucesso"=>false,
                        "mensagem"=>ERRO_NAO_POSSUI_PERMISSAO);
        }
    }
}