;(function(){

	'use strict';
	angular
		.module('tobo.components')
		.component('toboAreaMap', {
			bindings: {
				imageSrc: '<'
			},
			templateUrl: window.tobo.url + '/' + window.tobo.paths.components + 'tobo-area-map/tobo-area-map.component.tpl.html',
			controller: ToboAreaMapComponentController
		});
		ToboAreaMapComponentController.$inject = [ '$scope', '$timeout', 'coords' ];
		function ToboAreaMapComponentController( $scope, $timeout, coords ){
			var $ctrl = this;	
			$ctrl.id = 'area';
			$ctrl.coords = '';
			var x, y;

			
			$ctrl.$onInit = function(){
				$timeout(function(){
					
					if($ctrl.imageSrc){

						var img = new Image();
						img.onload = function () {
							imageResolve();
						}
						img.src = $ctrl.imageSrc;
					}
					
				}, 200);				
			}
			$ctrl.saveCoords 	= saveCoords;
			$ctrl.clearCoords 	= clearCoords;

			function clearCoords(){
				clearPoly();
				$ctrl.coords = '';
			}

			function saveCoords(){
		
				coords
					.saveCoords('floor', 1, coords.normalize( $ctrl.coords ) )
						.then(function(response){
							console.log(response);
							clearPoly();
							$ctrl.coords = '';
							window.location.reload();
						});
				
				

			}			

			function drawPoly(coords, fillColor, callback){
				fillColor = !fillColor ? 'rgba(64, 125, 255, 0.4)' : fillColor;
				var c2 = document.getElementById($ctrl.id).getContext('2d');
				var poly = coords;

				// copy array
				var shape = poly.slice(0);

				c2.beginPath();
				c2.moveTo(shape.shift(), shape.shift());
				while (shape.length) {
				c2.lineTo(shape.shift(), shape.shift());
				}
				c2.closePath();
				c2.fillStyle = fillColor;
				c2.fill();
				
				if(typeof callback === 'function')
					callback();
			}

			function imageResolve(){
				var target = document.querySelector('.image');
				var c = document.getElementById($ctrl.id);				
				c.width = target.offsetWidth;
				c.height = target.offsetHeight;
				$ctrl.width = c.width;
				$ctrl.height = c.height;
				
				drawGrid(c);

				c.addEventListener("click", function(e){ clickOnCanvas(e, c); }, false);
			}

			function clickOnCanvas(e, c){
				$ctrl.coords += e.offsetX + ', ';
				$ctrl.coords += e.offsetY + ', ';
				// console.log(e);
        		var newCoords = $ctrl.coords;
				clearPoly();
				drawPoly(eval('[' + newCoords + ']'));
				$scope.$apply();

			}

			function clearPoly(){
				$ctrl.canvas.clearRect(0, 0, $ctrl.canvas.canvas.width, $ctrl.canvas.canvas.height);
				$ctrl.canvas.beginPath();
			}
			function drawGrid(c){
				 var gridOptions = {
	                minorLines: {
	                    separation: 20,
	                    color: '#dadada'
	                },
	            };

	            drawLines(c, gridOptions.minorLines);
			}

			function drawLines(cnv, lineOptions) {

	            var iWidth = cnv.width;
	            var iHeight = cnv.height;

	            var ctx = cnv.getContext('2d');
				$ctrl.canvas = ctx;

				coords
				.getCoords('floor', 1)
				.then(function(coords){
					if(coords.floor && coords.floor[0] && coords.floor[0].apartments.length){
						angular.forEach(coords.floor[0].apartments, function(v){
							var color = v.status ? 'rgba(0, 174, 92, 0.7)' : 'rgba(200,0,0, 0.7)';
							drawPoly(eval('[' + v.details + ']'), color);
						});
					}
					
				});
	        }
		}
})();