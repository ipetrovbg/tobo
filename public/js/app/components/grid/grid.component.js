;(function(){
    'use strict';
    angular
        .module('tobo.components')
            .component('grid', {
                transclude: true,
                bindings: {
                     column: '@'
                },
                controller: GridComponentController,
                templateUrl: window.tobo.url + '/' + window.tobo.paths.components + '/grid/grid.component.tpl.html',
            });
            GridComponentController.$inject = [];
            function GridComponentController(){
                var $ctrl = this;
            };
})();