app.factory('schoolService',['$http', function($http) {	
	return {		
		// http://mobile-aceite.tcu.gov.br/appCivicoWeb/web/externo/#/principal
		// rest/estabelecimentos/latitude/{latitude}/longitude/{longitude}/raio/{raio}
		// http://mobile-aceite.tcu.gov.br:80/nossaEscolaRS/rest/escolas/latitude/-26.30326424/longitude/-48.83010864/raio/10?quantidadeDeItens=3  (opcional qtde nessa localizacao)
		// http://mobile-aceite.tcu.gov.br:80/nossaEscolaRS/rest/escolas?uf=SC
		// http://mobile-aceite.tcu.gov.br:80/nossaEscolaRS/rest/escolas?uf=SC?municipio=Joinville
		
		
		baseURL: "http://mobile-aceite.tcu.gov.br:80/nossaEscolaRS/",
		queryParams: {
			page: 0,
			state: "",
			city: "",
			latitude: "",
			longitude: "",
			radious: "10", //200 km			
			qty: 0
		},
		//Gets a list of schools		
		schools: function(longitude, latitude, page) {
			var params = "";
			/* Is not a geo position query */
			if((this.queryParams.latitude == "") && (this.queryParams.longitude == "")){
				params = "?";
				if(this.queryParams.page != 0){
					params += "pagina=" + this.queryParams.page;				
				}
				
				if(this.queryParams.state != ""){
					if(params != "?")
						params += "&";						
					params += "uf=" + this.queryParams.state;
				}
				
				if(this.queryParams.city != ""){
					if(params != "?")
						params += "&";						
					params += "municipio=" + this.queryParams.city;
				}
			}
			else{
				/* Is a GEO POSITION query */
				params = "/latitude/" + this.queryParams.latitude + "/longitude/" + this.queryParams.longitude;
				if(this.queryParams.radious > 0)
					params += "/raio/"+this.queryParams.radious;
				
				if(this.queryParams.qty > 0)
					params += "?quantidadeDeItens="+this.queryParams.qty;
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
