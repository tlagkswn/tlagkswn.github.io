<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<body>

<div ng-app="myApp" ng-controller="Ctrl">

p1: <input type="number" ng-model="p1"><br>
p2: <input type="number" ng-model="p2"><br>
p1: <input type="number" ng-model="p3"><br>
p2: <input type="number" ng-model="p4"><br>
<br>
Full Name: {{sumall()}}

</div>

<script>
var app = angular.module('myApp', []);
app.controller('Ctrl', function($scope) {
    $scope.p1 = 4;
    $scope.p2 = 5;
    $scope.sumall = function() {
		var sum = Number($scope.p1)+ Number($scope.p2) +Number($scope.p3)+ Number($scope.p4);
		if(isNaN(sum))
		{
			sum = "Nothing";
		}
        return sum;

    };
});
</script>

</body>
</html>
