<?php
require_once "../enum/EnumUsuario.php";
class Usuario{
    public function CriarUsuario($p_NomeUsuario, $p_EmailUsuario, $p_TipoUsuario, $p_DesSenha, $p_DesSenhaRepetida){
        require_once "Usuario.php";
        require_once "Conexao.php";
        
        $Usuario = new Usuario();
        
        $erro = false;
        $mensagem = null;
        
        if(empty($p_NomeUsuario)){
            $erro = true;
            $mensagem = ERRO_NOME_OBRIGATORIO;
        }elseif(empty($p_EmailUsuario)){
            $erro = true;
            $mensagem = ERRO_EMAIL_OBRIGATORIO;
        }elseif(empty($p_DesSenha)){
            $erro = true;
            $mensagem = ERRO_SENHA_OBRIGATORIA;
        }elseif($p_DesSenhaRepetida !== $p_DesSenha){
            $erro = true;
            $mensagem = ERRO_REPETIR_SENHA;
        }elseif($Usuario->VerificarEmail($p_EmailUsuario)){
            $erro = true;
            $mensagem = ERRO_EMAIL_EXISTE;
        }
        
        if($erro){
            return array("sucesso"=>false,
            "mensagem"=>$mensagem);
        }
        
        $senha = sha1($p_DesSenha);
        $sql = "INSERT INTO `USUARIO`(`DES_EMAIL`, `DES_SENHA`, `DES_TIPO_USUARIO`, `NOM_USUARIO`) VALUES ('$p_EmailUsuario','$senha','$p_TipoUsuario','$p_NomeUsuario')";
        if ($conn->query($sql) === true) {
            return array("mensagem" => SUCESSO_USUARIO_CRIADO,
                        "sucesso" => true);
        } else {
             return array("mensagem" => ERRO_USUARIO_CRIADO."Erro:".$conn->error,
                          "sucesso" => false);
        }
        
        $conn->close();
    }
    
    public function GetUsuarios($p_Pagina){
        require_once "Conexao.php";
        $QTD_Exibida = 5; 
        
        if(empty($p_Pagina) || $p_Pagina < 1){
            $p_Pagina = 1;
        }
        
        $sql = "SELECT COUNT(COD_USUARIO) AS QTD_USUARIO FROM USUARIO";
        $resultado = $conn->query($sql);
        
        if($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $QTD_Usuario = $row["QTD_USUARIO"];
            }
        }
        
        $Num_Paginas = ceil($QTD_Usuario/$QTD_Exibida); 
        
        $inicio = ($QTD_Exibida*$p_Pagina)-$QTD_Exibida; 
       
        $sql = "SELECT NOM_USUARIO, DES_EMAIL FROM USUARIO ORDER BY COD_USUARIO DESC LIMIT $inicio,  $QTD_Exibida";
        $resultado = $conn->query($sql);
        $usuarios = array();
        
        if($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                $usuarios[] = $row;
            }
        }
        
        if(empty($usuarios)){
            return array("sucesso"=>false,
            "mensagem"=>ERRO_NENHUM_USUARIO);
        }
        
        return array("sucesso"=>true,
                    "TotalRegistros"=>(int)$QTD_Usuario,
                    "QuantidadePaginas"=>$Num_Paginas, 
                    "data"=>$usuarios);
        $conn->close();
    }
    
    public function VerificarEmail($p_EmailUsuario){
        include "Conexao.php";
        
        $sql = "SELECT COUNT(COD_USUARIO) AS QTD_EMAIL FROM USUARIO WHERE DES_EMAIL='$p_EmailUsuario'";
        $resultado = $conn->query($sql);
         if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $QTD_Email = $row["QTD_EMAIL"];
            }
        }
        
        if($QTD_Email > 0)
            return true;
        else
            return false;

         $conn->close();
    }
    
    public function DeletarUsuario(){
        
    }
    
    public function AlterarDadosUsuario(){
        
    }
    
    public function AlterarSenhaUsuario(){
        
    }
}
