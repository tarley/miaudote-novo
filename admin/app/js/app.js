var app = angular.module("miaudote_admin", ['ngRoute', 'miaudote.controller']);
app.config(function($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: 'app/pages/Home/_login.html',
                controller: 'LoginController'
            })

            .when('/home', {
                templateUrl: 'app/pages/Home/_admin.html',
                controller: 'AdminController'
            })

            .when('/Animal/CadastroAnimal', {
                templateUrl: 'app/pages/Animal/_cadastro_animal.html',
                controller: 'AnimalController'
            })

            .when('/Animal', {
                templateUrl: 'app/pages/Animal/_listagem_animal.html',
                controller: 'AnimalController'
            })

            .when('/Instituicao/CadastroInstituicao', {
                templateUrl: 'app/pages/Instituicao/_cadastro_instituicao.html',
                controller: 'InstituicaoController'
            })

            .when('/Instituicao', {
                templateUrl: 'app/pages/Instituicao/_listagem_instituicao.html',
                controller: 'InstituicaoController'
            })

            .when('/Usuario/CadastroUsuario', {
                templateUrl: 'app/pages/Usuario/_cadastro_usuario.html',
                controller: "UsuarioController"
            })

            .when('/Usuario', {
                templateUrl: 'app/pages/Usuario/_listagem_usuario.html',
                controller: "UsuarioController"
            })

            .when('/MinhaConta', {
                templateUrl: 'app/pages/MinhaConta/_minha_conta.html',
                controller: "MinhaContaController"
            })

            .otherwise({
                redirectTo: '/home'
            });
    })

    .directive('fileInput', function() {
        return {
            restrict: 'A',
            scope: {
                fileInput: "="
            },
            link: function(scope, element) {
                element.bind("change", function(changeEvent) {
                    var reader = new FileReader();
                    reader.onload = function(loadEvent) {
                        scope.$apply(function() {
                            scope.fileInput = loadEvent.target.result;
                        });
                    };
                    reader.readAsDataURL(changeEvent.target.files[0]);
                });
            }
        };
    });
