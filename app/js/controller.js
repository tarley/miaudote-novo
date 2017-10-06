angular.module("miaudote", [])

    .controller('MainController', function MainController($scope) {
        
        $scope.init = function() {
            $scope.pet = {};
            
            $scope.listaPets = listarPets();
        }

        $scope.filtrar = function() {
            alert('true');
            var listaPets = listarPets();
            
            var nome = $scope.pet.nome;
            
            if(nome != undefined && nome != null && nome.trim().length > 0)
                listaPets = listaPets.filter(function(pet) {
                    return pet.nome.toUpperCase().indexOf(nome.toUpperCase()) !== -1;
                });
                
            $scope.listaPets = listaPets;
        }

        $scope.configSlides = function() {
            $(document).ready(function() {
                $('.parallax').parallax();
                $('.slider').slider();
            });
        }

        $scope.configParceiros = function() {
            $(document).ready(function() {
                $('.slider1').bxSlider({
                    slideWidth: 180,
                    minSlides: 2,
                    maxSlides: 5,
                    slideMargin: 5
                });
            });
        }

        $scope.configFiltro = function() {
            $(document).ready(function() {
                $('select').material_select();
            });
        }

        $scope.configModal = function() {
            $(document).ready(function() {
                $('.modal').modal();
            });
        }
        
        function listarPets() {
            return [{
                    id: 1,
                    nome: 'Belinho',
                    imagem: '/app/img/animais/belinho.jpg'
                },
                {
                    id: 2,
                    nome: 'Menina',
                    imagem: '/app/img/animais/menina.jpg',
                },
                {
                    id: 3,
                    nome: 'Piscuila',
                    imagem: '/app/img/animais/piscuila.jpg',
                },
                {
                    id: 4,
                    nome: 'Rosinha',
                    imagem: '/app/img/animais/rosinha.jpeg',
                },
                {
                    id: 5,
                    nome: 'Menina',
                    imagem: '/app/img/animais/menina.jpg',
                },
                {
                    id: 6,
                    nome: 'Frida',
                    imagem: '/app/img/animais/frida.jpeg',
                },
                {
                    id: 7,
                    nome: 'Félix',
                    imagem: '/app/img/animais/felix.jpeg',
                },
                {
                    id: 8,
                    nome: 'Panda',
                    imagem: '/app/img/animais/panda.jpeg',
                },
                {
                    id: 9,
                    nome: 'Nome',
                    imagem: '/app/img/8.jpg',
                },
                {
                    id: 10,
                    nome: 'Nome',
                    imagem: '/app/img/9.jpg',
                },
                {
                    id: 11,
                    nome: 'Nome',
                    imagem: '/app/img/3.jpg',
                },
                {
                    id: 12,
                    nome: 'Nome',
                    imagem: '/app/img/10.jpg',
                },
                {
                    id: 13,
                    nome: 'Nome',
                    imagem: '/app/img/11.jpg',
                }
            ];
        }
    });
