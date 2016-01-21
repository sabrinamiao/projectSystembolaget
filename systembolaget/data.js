var app = angular.module('myApp', []);

//Get data from JSON
app.controller('sortController', ['$scope', '$http', function ($scope, $http) {


    $http.get('../php/api.php')
        .success(function (data) {
            $scope.search = [];
            $scope.sortiments = data;
        }).error(function (data, status, headers, config) {
            console.log('error');
        });


}]);
