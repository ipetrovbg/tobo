;(function(){
    'use strict';
    angular
        .module('tobo.components')
            .component('content', {
                transclude: true,
                templateUrl:  window.tobo.url + '/' + window.tobo.paths.components + '/content/content.component.tpl.html',
                controller: ContentComponentController
            });
            ContentComponentController.$inject = [];
            function ContentComponentController(){
                var $ctrl = this;
            };
})();