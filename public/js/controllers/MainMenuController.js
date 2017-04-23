// Name: MainMenuController.js
// Description: The AngularJS controller that supports the main menu.
//
// History:
// Edward Wang   4/20/2017  Created 
'use script';
merchantApp.controller('MainMenuController',
	function MainMenuController($scope, $location) {
	
		// "Callback" for the New Product button.
		$scope.createProduct = function() {
			// Navigate to the /uiNewProduct route (New Product page).
			$location.url('/uiNewProduct');
		}
		
		// "Callback" for the Product List button.
		$scope.listProducts = function() {
			// Navigate to the /uiProduct route (Product List page).
			$location.url('/uiProduct');
		}
	});