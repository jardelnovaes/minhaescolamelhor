app.controller("schoolController", ['$scope', 'schoolService', /*'$routeParams',*/ function($scope, schoolService /*, $routeParams*/) {
	$scope.schoolsPage = 1;
	
	$scope.location = {
		name: "Em Joinvile, SC",
		longitude: -26.30326424,
		latitude: -48.83010864
	};
	
	$scope.getSchools = function() {
		schoolService.schools($scope.location.longitude, $scope.location.latitude, $scope.schoolsPage-1)
			.success(function(data) { 
				//console.log(data);
				$scope.schools = data;
			});
	};
	
	$scope.getNextSchools = function() {
		$scope.schoolsPage++;
		$scope.getSchools();
	}
	
	$scope.getSchools();
}]);