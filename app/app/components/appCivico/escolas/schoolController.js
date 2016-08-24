app.controller("schoolController", ['$scope', 'schoolService', /*'$routeParams',*/ function($scope, schoolService /*, $routeParams*/) {	
	$scope.schoolsPage = 1;
	schoolService.queryParams.page = $scope.schoolsPage;
	
	$scope.location = {
		name: "Em Joinvile, SC",
		longitude: -48.83010864,
		latitude: -26.30326424
	};
	
	//test
	//schoolService.queryParams.latitude = -26.30326424; schoolService.queryParams.longitude = -48.83010864; 
	//schoolService.queryParams.latitude = -26.30326424; schoolService.queryParams.longitude = -48.83010864; schoolService.queryParams.qty = 5;
	schoolService.queryParams.uf = "SC"; schoolService.queryParams.city = "Joinville";
	
	$scope.getSchools = function() {
		
		//schoolService.schools($scope.location.longitude, $scope.location.latitude, $scope.schoolsPage-1)
		schoolService.schools($scope.location.longitude, $scope.location.latitude, $scope.schoolsPage-1)
			.success(function(data) { 
				//console.log(data);				
				$scope.schools = data;
			});
	};
	
	$scope.getNextSchools = function() {
		$scope.schoolsPage++;		
		schoolService.queryParams.page = $scope.schoolsPage;
		//schoolService.queryParams.page++;
		$scope.getSchools();
	}
	
	$scope.getPreviousSchools = function() {
		if($scope.schoolsPage > 1){
			$scope.schoolsPage--;
			schoolService.queryParams.page = $scope.schoolsPage;
			//schoolService.queryParams.page--;
			$scope.getSchools();
		}
	}
	
	$scope.getSchools();
}]);

/*
	Angular JS to App
	http://frontinbrazil.com.br/aplicativos-mobile-com-o-angularjs-e-ionic/
	http://ionicframework.com/getting-started/
	http://stackoverflow.com/questions/25961013/how-to-convert-an-existing-angularjs-web-app-to-a-cordova-app
	http://dzfweb.com.br/2014/12/10/desenvolvimento-mobile-com-apache-cordova-no-visual-studio-com-angularjs/
	
	
	
	---> templates: blank, tabs e sidemenu
	
	# npm install -g cordova ionic
	# ionic start myApp <template [blank|tabs|sidemenu]>
	
	# ionic start <appName> <template>
	# cd <appName>
	# ionic platform add ios
	# ionic platform add android
	
	# ionic build ios
	# ionic emulate ios
	
	npm install -g cordova ionic
	ionic start memApp sidemenu
	cd memApp
	ionic platform add android
	ionic build android
	ionic emulate android
	

*/