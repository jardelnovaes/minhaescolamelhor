app.factory('escolasService',['$http', function($http) {	
	return {		
		// rest/estabelecimentos/latitude/{latitude}/longitude/{longitude}/raio/{raio}
		// http://mobile-aceite.tcu.gov.br:80/nossaEscolaRS/rest/escolas/latitude/-48.83010864/longitude/-26.30326424/raio/200
		raio: 200, //200 km
		baseURL: "http://mobile-aceite.tcu.gov.br:80/nossaEscolaRS/",
		
		//Gets a list of schools		
		schools: function(longitude, latitude) {
			var params = "?";
			
			if((longitude != 0) && (latitude != 0)){
				params += "/latitude/" + latitude + "/longitude/"+longitude+"/raio/" +this.raio;
			}
			console.log(params);
			var result    = 	
				$http.get(this.baseURL + "rest/escolas" + params)
					.success(function(data) { 
						return data; 
					}) 
					.error(function(err) { 
						return err; 
					}); 					
					
				return result;
		},
		schools2: function() {						
			var data = 
				$http.get("assets/test/escolas.json") 
				.success(function(data) { 
					console.log("success");
					console.log(data);
					return data; 
				}) 
				.error(function(err) { 
					console.log("error");
					return err; 
				}); 
			return data;	
		}
	}
}]);
