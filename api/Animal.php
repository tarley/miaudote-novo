<?php

require_once "../controller/Usuario.php";

class Animal {

    public function cadastrarAnimal() {
        
    }
    
    public function excluirAnimal($id) {
        
        $stmt = $conn->prepare("
                UPDATE ANIMAL
                SET EXCLUIDO = 'T'
                WHERE COD_ANIMAL = $id
        ");
    }
    
    public function adotarAnimal($id) {
        $stmt = $conn->prepare("
                UPDATE ANIMAL
                SET ADOTADO = 'T'
                WHERE COD_ANIMAL = $id
        ");
    }
}

?>