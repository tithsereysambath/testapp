var app = angular.module('TestApp',['ui.router','ngMessages']);

app.config(function($stateProvider, $urlRouterProvider){
	$urlRouterProvider.otherwise('/members');
    $stateProvider
        .state('home', {
            url: "/members",
            templateUrl: "templates/index.html",
            controller: 'MemberController'
        })
});