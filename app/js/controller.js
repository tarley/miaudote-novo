angular.module("miaudote", [])

    .controller('MainController', function MainController($scope) {
        
        $scope.init = function() {
            $scope.filtro = {};
            $scope.pet = {};
            
            $scope.listaPets = listarPets();
        }

        $scope.filtrar = function() {
            var listaPets = listarPets();
            
            var value = $scope.filtro.nome;
            
            if(value && value.trim().length > 0)
                listaPets = listaPets.filter(function(pet) {
                    return pet.nome.toUpperCase().indexOf(value.toUpperCase()) !== -1;
                });
            
            value = $scope.filtro.especie;
            
            if(value && value != 'Todos')
                listaPets = listaPets.filter(function(pet) {
                    return pet.especie == value;
                });
                
            value = $scope.filtro.uf;
            
            if(value && value != 'Todos')
                listaPets = listaPets.filter(function(pet) {
                    return pet.uf == value;
                });
                
            value = $scope.filtro.cidade;
            
            if(value && value != 'Todas')
                listaPets = listaPets.filter(function(pet) {
                    return pet.cidade == value;
                });
                
            
            if($scope.filtro.porteP || $scope.filtro.porteM  || $scope.filtro.porteG )
                listaPets = listaPets.filter(function(pet) {
                    return  ($scope.filtro.porteP && pet.porte == 'pequeno') ||
                            ($scope.filtro.porteM && pet.porte == 'médio') ||
                            ($scope.filtro.porteG && pet.porte == 'grande');
                });
                
            value = $scope.filtro.genero;
            
            if(value && value != 'Todos')
                listaPets = listaPets.filter(function(pet) {
                    return pet.genero == value;
                });
                
            value = $scope.filtro.idade;
            
            if(value && value != 'Todas')
                listaPets = listaPets.filter(function(pet) {
                    if(value == 'Filhote')
                        return pet.idadeEmMeses <= 12;
                    else if(value == 'Adulto')
                        return pet.idadeEmMeses > 12 && pet.idadeEmMeses <= 96 ;
                    else
                        return pet.idadeEmMeses > 96;
                });
                
            $scope.listaPets = listaPets;
        }

        $scope.detalhes = function(pet) {
            $scope.pet = pet;
            
             $(document).ready(function() {
                $('#modal3').modal('open');
            });
        }
        
        $scope.getGenero = function(pet) {
            if(pet.genero == undefined)
                return "";
                
            return pet.genero == 'M' ? 'Macho' : 'Femea';
        }
        
        $scope.isCastrado = function(pet) {
            if(pet.castrado == undefined)
                return "";
            
            var sufixo = 'o';
            
            if(pet.genero == 'F') {
                sufixo = 'a';
            }
            
            return (pet.castrado ? 'castrad' : 'não castrad') + sufixo; 
        } 
        
        $scope.getIdade = function(pet) {
            if(pet.idadeEmMeses == undefined || pet.idadeEmMeses == null || pet.idadeEmMeses == 0)
                return "";
            
            var anos = Math.floor(pet.idadeEmMeses / 12);
            var meses = pet.idadeEmMeses % 12;
            
            var retorno = "";
            
            if(anos >= 1)
                retorno += anos + " ano" + (anos > 1 ? 's': '');
            if(meses >= 1)
                retorno += (retorno != '' ? ' e ' : '') + meses + " mes" + (meses > 1 ? 'es': '');
            
            return retorno;
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
                    imagem: '/app/img/animais/belinho.jpg',
                    ong: 'Proteger',
                    descricao: 'Muito sociável e brincalhão.',
                    genero: 'M',
                    idadeEmMeses: 24,
                    porte: 'pequeno',
                    castrado: true,
                    local: 'Está no CCZ Contagem',
                    medicamento: '1 dose de anti-rábica e 1 dose de vermífugo',
                    especie: 'Cão',
                    uf: 'MG',
                    cidade: 'Belo Horizonte',
                },
                {
                    id: 2,
                    nome: 'Menina',
                    imagem: '/app/img/animais/menina.jpg',
                    ong: 'Proteger',
                    descricao: 'Precisa de espaço, extremamente brincalhona e carinhosa. Foi resgatado no parque gentil Diniz em Contagem.',
                    genero: 'F',
                    idadeEmMeses: 9,
                    porte: 'médio',
                    castrado: true,
                    local: 'Está no CCZ Contagem',
                    medicamento: '1 dose de anti-rábica e 1 dose de vermífugo'
                },
                {
                    id: 3,
                    nome: 'Piscuila',
                    imagem: '/app/img/animais/piscuila.jpg',
                    ong: 'Proteger',
                    descricao: 'Muito dócil, hiper sociável sociável com outros animais e com pessoas. Foi resgatado na desocupação Willian Rosa perto do CEASA.',
                    genero: 'M',
                    idadeEmMeses: 30,
                    porte: 'pequeno',
                    castrado: true,
                    local: 'Está no CCZ Contagem',
                    medicamento: '1 dose de anti-rábica e 1 dose de vermífugo'
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
