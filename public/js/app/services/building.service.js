;(function(){
    'use strict';
    angular
        .module('core.services')
            .service('building', BuildingService);
    BuildingService.$inject = [ 'appApi', '$http', '$q' ];
    function BuildingService( appApi, $http, $q ){
        var service = {
            save: saveBuilding
        }
        return service;
        function saveBuilding( building ){
            var def = $q.defer();
            $http({
                url: appApi.apiUrl + appApi.version + '/building',
                method: 'post',
                data: {
                    building: building
                }
            }).then(function ( response ) {
                def.resolve( response.data );
            }, function ( error ) {
                def.reject( error );
            });
            return def.promise;
        }
    }
})();