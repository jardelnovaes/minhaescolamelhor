app.controller("escolasController", ['$scope', 'escolasService', /*'$routeParams',*/ function($scope, escolasService /*, $routeParams*/) {
    $scope.firstName = "John";
    $scope.lastName = "Doe";
	
	//$scope.escolas = escolasService.schools2;
	
	$scope.joinville = {
		longitude: -26.30326424,
		latitude: -48.83010864
	};
	escolasService.schools($scope.joinville.longitude, $scope.joinville.latitude).success(
		function(data) { 
			$scope.schools = data;
	});
	//console.log($scope.schools[1]);
	//alert($scope.schools);
		
	
}]);


/*
app.controller('PhotoController', ['$scope', 'photos', '$routeParams', function($scope, photos, $routeParams) {
  photos.success(function(data) {
    $scope.detail = data[$routeParams.id];
  });
}]);
*/