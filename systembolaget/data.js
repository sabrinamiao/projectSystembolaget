var app= angular.module("myApp", []);

app.controller('getSortiment', function($scope, $http){
    $http.get('api.php')
        .then(function(response) {
            // here the data from the api is assigned to a variable named users
            $scope.sortiments =response.data.records;
        });
});