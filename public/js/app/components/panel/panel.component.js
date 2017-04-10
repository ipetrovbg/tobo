;(function(){
    'use strict';
    angular
        .module('tobo.components')
            .component('panel', {
                transclude: true,
                bindings: {
                    heading: '<',
                    type: '@'
                },
                controller: PanelComponentController,
                templateUrl: window.tobo.url + '/' + window.tobo.paths.components + '/panel/panel.component.tpl.html'
            });
            PanelComponentController.$inject = [];
            function PanelComponentController(){

            }
})();