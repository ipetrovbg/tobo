;(function(){
    'use strict';
    angular
        .module('tobo.controllers')
            .controller('DasboardController', DasboardController);
    DasboardController.$inject = [ 'user' ];
    function DasboardController( user ){
        var $ctrl = this;
        $ctrl.user = user;
    }
})();