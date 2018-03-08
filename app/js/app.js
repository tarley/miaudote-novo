var app = angular.module("miaudote_js", ['ngRoute', 'miaudote.controller']);
        app.config(function($routeProvider) {
            $routeProvider
                .when('/', {
                    templateUrl: 'app/pages/inicial/_home.html',
                    controller: 'MainController'
                })
                .when('/admin', {
                  templateUrl: 'app/pages/gerencial/admin.html'
                })
                .otherwise({
                 redirectTo: '/'
                });
});