<?php
require_once "../enum/EnumAuth.php";
class Auth{
   
 public function CriarSessao($p_Email, $p_Senha) {
        include "Connect.php";
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
        
        $sql = "SELECT DES_SENHA, DES_TIPO_USUARIO FROM USUARIO WHERE DES_EMAIL='$email'";
        $resultado = $conn->query($sql);
 
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $SenhaCorreta = $row["DES_SENHA"];
                $tipo = $row["DES_TIPO_USUARIO"];
            }
        }
        
        if($senha !== $SenhaCorreta){
            return array("sucesso"=>false,
                        "mensagem"=>SESSAO_INVALIDA);
        }
        
        
        
        $conn->close();
    }
    
    
    public function EncerrarSessao(){
        
    }
}