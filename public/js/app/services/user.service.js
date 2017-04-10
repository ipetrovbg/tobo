;(function(){
	'use strict';
	angular
	.module('core.services')
	.service('userService', userService);

	userService.$inject = [ '$http', '$q', 'appApi' ];

	function userService( $http, $q ) {
		var service = {
			isAuthenticated:isAuthenticated,
		}
		return service;

		function isAuthenticated(){
			var def = $q.defer();
            $http({
                url: appApi.apiUrl + appApi.version + '/is-authenticated'
            }).then(function ( response ) {
                def.resolve( response.data );
            }, function ( error ) {
                def.reject( error );
            });
            return def.promise;
		}
	}

})();