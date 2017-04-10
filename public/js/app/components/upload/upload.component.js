;(function(){
	'use strict';
	angular
		.module('tobo.components')
		.component('upload', {
			templateUrl: window.tobo.url + '/' + window.tobo.paths.components + 'upload/upload.component.tpl.html',
			controller: UploadComponentController
		});
		UploadComponentController.$inject = [ 'FileUploader', 'appApi' ];
		function UploadComponentController( FileUploader, appApi ){
			var $ctrl = this;
			$ctrl.uploader = new FileUploader({
				autoUpload: true,
				headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            },
	            url: appApi.apiUrl + appApi.version + '/images'
	        });
	        $ctrl.uploader.onAfterAddingFile = function(fileItem) {
	            // console.info('onAfterAddingFile', fileItem);
	        };
	        $ctrl.uploader.onCompleteItem = function(item, response, status, headers){
	        	console.log(status);
	        	if(status === 200){
	        		$ctrl.imagePreview = response;
	        	}	        	
	        }
		}
})();