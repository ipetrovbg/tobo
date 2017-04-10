;(function(){
	'use strict';
	var paths = {
        components: 'js/app/components/',
        app: 'js/app/',
        images: 'images/'
    }
    window.tobo = !window.tobo ? {
    	paths:{}
    } : window.tobo;
    
    window.tobo.paths = paths;
    window.tobo.app = "Tobo Ltb.";
}());