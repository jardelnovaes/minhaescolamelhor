app.directive("schoolsInfo", function() {
    return {
		restrict : "E",
		scope: {
			items: '=items',
			filterFied: '=filter'
		},
        templateUrl: 'app/shared/directives/schools-info.html'
    };
});