;(function(){
    'use strict';
    angular
        .module('tobo.controllers')
            .controller('BuildingController', BuildingController);
    BuildingController.$inject = [ 'building' ];
    function BuildingController( building ){
        var $ctrl = this;

        $ctrl.saveBuilding = saveBuilding;

        function saveBuilding( form ){
            if(!form.name.$error.required){
                
                building
                    .save($ctrl.building)
                        .then(function(response){
                            $ctrl.building = {};
                        });
            }
        }
    }
})();