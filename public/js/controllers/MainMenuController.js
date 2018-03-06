// Name: MainMenuController.js
// Description: The AngularJS controller that supports the main menu.
//
// History:
// Edward Wang   4/20/2017  Created.
// Edward Wang   2/15/2018  Add callback for Logout link.
// Edward Wang   3/05/2018  Add callbacks for Theme links and Logout link.
'use script';
merchantApp.controller('MainMenuController',
	function MainMenuController($scope, $location, $window) {
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
		
		// "Callback" for the New Order button.
		$scope.createOrder = function() {
			// Navigate to the /uiNewOrder route (New Order page).
			$location.url('/uiNewOrder');
		}
		
		// "Callback" for the Order List button.
		$scope.listOrders = function() {
			// Navigate to the /uiOrder route (Order List page).
			$location.url('/uiOrder');
		}
		
		// "Callback" for the Logout button.
		$scope.logoutSystem = function() {
			// Logout via the Laravel route rather than using
			// an Angular route.
			$window.location.href = '/logout';
		}
		// "Callback" for the Default theme button.
		$scope.setThemeToDefault = function() {
			var linkElement = angular.element( document.querySelector( '#sitetheme' ) );
			linkElement.attr("href", "css/bootstrap.min.css");
		}
		// "Callback" for the Cyborg theme button.
		$scope.setThemeToCyborg = function() {
			var linkElement = angular.element( document.querySelector( '#sitetheme' ) );
			linkElement.attr("href", "css/bootstrap.cyborg.min.css");
		}
		// "Callback" for the Flatly theme button
		$scope.setThemeToFlatly = function() {
			var linkElement = angular.element( document.querySelector( '#sitetheme' ) );
			linkElement.attr("href", "css/bootstrap.flatly.min.css");
		}
		// "Callback" for the Slate theme button
		$scope.setThemeToSlate = function() {
			var linkElement = angular.element( document.querySelector( '#sitetheme' ) );
			linkElement.attr("href", "css/bootstrap.slate.min.css");
		}
		// "Callback" for the Spacelab theme button
		$scope.setThemeToSpacelab = function() {
			var linkElement = angular.element( document.querySelector( '#sitetheme' ) );
			linkElement.attr("href", "css/bootstrap.spacelab.min.css");
		}
		// "Callback" for the Superhero theme button
		$scope.setThemeToSuperhero = function() {
			var linkElement = angular.element( document.querySelector( '#sitetheme' ) );
			linkElement.attr("href", "css/bootstrap.superhero.min.css");
		}
	});