  (function(){
    'use strict';
    angular.module('miaudote.controller')
	
    .controller('AnimalController', function CadAnimalController($scope) {
           
           $scope.CadastrarAnimal = function() {
                
                var nome         = $scope.nome;
                var sexo         = $scope.sexo;
                var especie      = $scope.especie;
                var castrado     = $scope.castrado;
                var idade        = $scope.idade;
                var porte        = $scope.porte;
                var instituicao  = $scope.instituicao;
                var observacao   = $scope.observacao;
                var temperamento = $scope.temperamento;
                /*var file         = file;*/
                
                
                $.ajax({
                    type: "POST",
                    url: "../api/Animal.php?acao=CadastrarAnimal",
                    data: "nome=" + nome + "&sexo=" + sexo + "&especie=" + especie + "&castrado=" + castrado + "&idade=" + idade + 
                          "&porte=" + porte + "&instituicao=" + instituicao + "&observacao=" + observacao + "&temperamento=" + temperamento,
                          /*"&file=" + file*/
                    success: function(e) {
                        if (e.sucesso) {
                           $("#mensagem").html("<div class=\"col-md-12\" style=\"border:1px solid #b3e096; background-color:#a2db7f; border-radius:4px;\">" + e.mensagem + "</div>");
                            window.location = "/#!/Animal";
                        }
                        else {
    						 $("#mensagem").html("<div class=\"col-md-12\" style=\"border:1px solid #efa39b; background-color:#f7ded7; border-radius:4px;\">" + e.mensagem + "</div>");
                        }
                    }
                });
                  /* $http.post('api/Animal.php?acao=CadastrarAnimal')*/           
           }	  
    });
    	
})();