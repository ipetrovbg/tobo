;(function(){

	'use strict';

	angular
		.module('tobo.components')
		.component('topMenu', {
			bindings: {},
			templateUrl: window.tobo.url + '/' + window.tobo.paths.components + 'top-menu/top-menu.component.tpl.html',
			controller: TopMenuComponentController
		});

		TopMenuComponentController.$inject = [ 'user', 'appApi' ];
		function TopMenuComponentController( user, appApi ){
			var $ctrl = this;
			$ctrl.appName = window.tobo.app;
			$ctrl.appUrl = window.tobo.url;
			$ctrl.user = user;
		}

})();