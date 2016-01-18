var app= angular.module('myApp', []);

app.controller('sortCtrl', function($scope, $http){
    $http.get('api.php').then(function(data){
        $scope.sortiments = data;
        });
});