;(function(){
    'use strict';
    angular
        .module('core.services')
        .service('coords', CoordSevice);

        CoordSevice.$inject = [ '$http', '$q', 'appApi' ];

        function CoordSevice( $http, $q, appApi ){

            var service = {
                saveCoords:saveCoords,
                normalize:normalizeCoordinates,
                getCoords: getCoords
            }
            return service;

            function getCoords( container, id ){
                
                var def = $q.defer();
                $http({
                    url: appApi.apiUrl + appApi.version + '/coords/' + container + '/' + id
                }).then(function ( response ) {
                    def.resolve( response.data );
                }, function ( error ) {
                    def.reject( error );
                });
                return def.promise;
            }

            function normalizeCoordinates(coords){

                return eval('[' + coords + ']').toString();
                
            }

            function saveCoords(container, id, coords){
                var def = $q.defer();
                $http({
                    url: appApi.apiUrl + appApi.version + '/coords/' + container + '/' + id,
                    method: 'POST',
                    data: {
                        coords: coords
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