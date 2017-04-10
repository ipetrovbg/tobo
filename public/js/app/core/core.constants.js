(function() {
    'use strict';
    angular
        .module('tobo.core')
        .constant('appApi', {
            apiUrl: 'http://localhost:8000/api/',
            url: 'http://localhost:8000/',
            version: 'v1',
            currentUser: window.tobo.user
        })
         .constant('user', window.tobo.user);
})();