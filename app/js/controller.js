angular.module("miaudote", [])

    .controller('MainController', function MainController($scope) {
        
        $scope.init = function() {
            $scope.filtro = {};
            $scope.pet = {};
            
            $scope.listaPets = listarPets();
            $scope.listaPets1 = listarPets1();
        }
        
        $scope.opcoesIdade = [
            { name: 'Todas', value: 'Todas' },
            { name: 'Até 1 ano (Filhote)', value: 'Filhote' },
            { name: '1 a 8 anos (Adulto)', value: 'Adulto' },
            { name: 'Acima de 8 anos (Idoso)', value: 'Idoso' }
        ];
        
        $scope.opcoesUf = [
            { name: 'Todos', value: 'Todos' },
            { name: 'MG', value: 'MG' },
            { name: 'SP', value: 'SP' },
            { name: 'RJ', value: 'RJ' }
        ];
        
        $scope.opcoesCidade = [
            { name: 'Todas', value: 'Todas' },
            { name: 'Belo Horizonte', value: 'Belo Horizonte' },
            { name: 'São Paulo', value: 'São Paulo' },
            { name: 'Rio de Janeiro', value: 'Rio de Janeiro' }
        ];
        
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
            var sufixo;
            
            if(pet.castrado == 'M')
                sufixo = 'o';
            
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
                    especie: 'Cão',
                    castrado: true,
                    uf: 'MG',
                    local: 'Está no CCZ Contagem',
                    medicamento: '1 dose de anti-rábica e 1 dose de vermífugo'
                },
                {
                    id: 3,
                    nome: 'Piscuila',
                    imagem: '/app/img/animais/piscuila.jpg',
                    ong: 'Proteger',
                    descricao: 'Muito dócil, hiper sociável sociável com outros animais e com pessoas. Foi resgatado na desocupação Willian Rosa perto do CEASA.',
                    genero: 'F',
                    idadeEmMeses: 30,
                    porte: 'pequeno',
                    especie: 'Cão',
                    castrado: true,
                    local: 'Está no CCZ Contagem',
                    medicamento: '1 dose de anti-rábica e 1 dose de vermífugo'
                },
                {
                    id: 4,
                    nome: 'Rosinha',
                    imagem: '/app/img/animais/rosinha.jpeg',
                    descricao: 'Muito carinhosa, meiga e tímida. Bem sociável com outros animais para brincar. Foi resgatada pelo CCZ Contagem junto com outros cães na desocupação Willian Rosa, perto do CEASA.',
                    castrado: true,
                    especie: 'Cão',
                    genero: 'F',
                    local: 'Esta no CCZ Contagem',
                    idadeEmMeses: 9,
                    porte: 'medio',
                    
                },
                {
                    id: 6,
                    nome: 'Frida',
                    imagem: '/app/img/animais/frida.jpeg',
                    especie: 'Gato',
                    descricao: 'A Frida é carinhosa e cuida do seu irmão Félix, adora dar lambeijos para limpar a pelagem linda dele.',
                    castrado: true,
                    idadeEmMeses: 12,
                    medicamento: 'Vacinada',
                    genero: 'F',
                },
                {
                    id: 7,
                    nome: 'Félix',
                    imagem: '/app/img/animais/felix.jpeg',
                    especie: 'Gato',
                    descricao: 'O Félix é tímido e assustado, mas muito carente. Não desgruda da sua irmã Frida, sua fiel Companheira',
                    idadeEmMeses: 12,
                    medicamento: 'Vacinado',
                    genero: 'M',
                },
                {
                    id: 8,
                    nome: 'Panda',
                    imagem: '/app/img/animais/panda.jpeg',
                    descricao: 'O Panda é um gatinho muito carinhoso, manhoso e brincalhão. Adora subir em árvores e brincar de esconder com outros gatinhos.',
                    idadeEmMeses: 7,
                    medicamento: 'Vacinado',
                    especie: 'Gato',
                    genero: 'F',
                },
                {
                    id: 5,
                    nome: 'Max',
                    imagem: '/app/img/animais/max.jpg',
                    especie: 'Cão',
                    descricao: 'Muito sociável e brincalhão.',
                    genero: 'M',
                    idadeEmMeses: 8,
                    porte: 'pequeno',
                    castrado: true,
                    medicamento: '1 dose de anti-rábica e 1 dose de vermífugo',
                    uf: 'MG',
                    cidade: 'Belo Horizonte',
                 },
                {
                    id: 9,
                    nome: 'Nina',
                    imagem: '/app/img/animais/nina.jpg',
                    especie: 'Gato',
                    descricao: 'Meiga e carinhosa.',
                    genero: 'F',
                    idadeEmMeses: 6,
                    porte: 'pequeno',
                    castrado: true,
                    medicamento: '1 dose de anti-rábica e 1 dose de vermífugo',
                    uf: 'MG',
                    cidade: 'Belo Horizonte',
                },

                {
                    id: 10,
                    nome: 'Carlinhos',
                    imagem: '/app/img/3.jpg',
                    especie: 'Cão',
                    descricao: 'Muito sociável e brincalhão.',
                    genero: 'M',
                    idadeEmMeses: 40,
                    porte: 'grande',
                    castrado: true,
                    medicamento: '1 dose de anti-rábica e 1 dose de vermífugo',
                    uf: 'MG',
                    cidade: 'Belo Horizonte',
                },
                {
                    id: 11,
                    nome: 'Pituca',
                    imagem: '/app/img/10.jpg',
                    especie: 'Cão',
                    descricao: 'Carinhosa e brincalhona.',
                    genero: 'F',
                    idadeEmMeses: 18,
                    porte: 'médio',
                    castrado: true,
                    medicamento: '1 dose de anti-rábica e 1 dose de vermífugo',
                    uf: 'MG',
                    cidade: 'Belo Horizonte',
                },
                {
                    id: 12,
                    nome: 'Bruce',
                    imagem: '/app/img/animais/bruce.jpg',
                    especie: 'Cão',
                    descricao: 'Muito imperativo e brincalhão.',
                    genero: 'M',
                    idadeEmMeses: 12,
                    porte: 'pequeno',
                    castrado: true,
                    medicamento: '1 dose de anti-rábica e 1 dose de vermífugo',
                    uf: 'MG',
                    cidade: 'Belo Horizonte',
                }
            ];
        }
        
        function listarPets1(){
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
                    especie: 'Cão',
                    castrado: true,
                    uf: 'MG',
                    local: 'Está no CCZ Contagem',
                    medicamento: '1 dose de anti-rábica e 1 dose de vermífugo'
                },
                {
                    id: 3,
                    nome: 'Piscuila',
                    imagem: '/app/img/animais/piscuila.jpg',
                    ong: 'Proteger',
                    descricao: 'Muito dócil, hiper sociável sociável com outros animais e com pessoas. Foi resgatado na desocupação Willian Rosa perto do CEASA.',
                    genero: 'F',
                    idadeEmMeses: 30,
                    porte: 'pequeno',
                    especie: 'Cão',
                    castrado: true,
                    local: 'Está no CCZ Contagem',
                    medicamento: '1 dose de anti-rábica e 1 dose de vermífugo'
                },
                {
                    id: 4,
                    nome: 'Rosinha',
                    imagem: '/app/img/animais/rosinha.jpeg',
                    descricao: 'Muito carinhosa, meiga e tímida. Bem sociável com outros animais para brincar. Foi resgatada pelo CCZ Contagem junto com outros cães na desocupação Willian Rosa, perto do CEASA.',
                    castrado: true,
                    especie: 'Cão',
                    genero: 'F',
                    local: 'Esta no CCZ Contagem',
                    idadeEmMeses: 9,
                    porte: 'medio',
                    
                }]
        }
        
    });
