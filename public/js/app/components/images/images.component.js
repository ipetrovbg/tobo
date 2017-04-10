;(function(){
	'use strict';
	angular
		.module('tobo.components')
		.component('images', {
			templateUrl:  window.tobo.url + '/' + window.tobo.paths.components + '/images/images.component.tpl.html',
			controller: ImagesComponentController
		});
		ImagesComponentController.$inject = [ '$http', 'appApi' ];
		function ImagesComponentController( $http, appApi ){
			var $ctrl = this;
			$http.get(appApi.apiUrl + appApi.version + '/images')
				.then(function(images){
					console.log(images);
					$ctrl.images = images.data;
				});
		}
})();