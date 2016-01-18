var app= angular.module('myApp', []);

app.controller('sortCtrl', ['$scope','$http',function($scope, $http){
    
$http.get('api.php')
    .then(function(data){
        $scope.sortiments = data.data.records;
        //console.log(data);
    })
    .catch(function (err){
        console.log(err);
    });
}]);