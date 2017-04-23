// Name: NewProductController.js
// Description: The AngularJS controller for the New Product template
// (NewProduct.html).
//
// History:
// Edward Wang   4/20/2017  Created.
'use strict';

merchantApp.controller('NewProductController',
	function NewProductController($scope, productData, $log, $location) {
		// Field validation patterns.
		$scope.dimensionPat = '^\\d*(\\.|\\.\\d{1,2})?$';
		$scope.weightPat    = '^\\d*(\\.|\\.\\d{1,2})?$';
		$scope.moneyPat     = '^\\d*\\.\\d\\d$';
		
		$scope.response = {};
		
		// "Callback" for the Save button.
		$scope.saveProduct = function(product, productForm) {
			if(productForm.$valid) {
				productData.save(product)
					.$promise
					.then(function(response) {
						$log.log('success', response);
						// Once the save succeeds, navigate to the /uiProduct
						// route (Product List page).
						$location.url("/uiProduct");
					})
					.catch(function(response) 
					{ 
						$log.log('failure', response)
					});
			}
		};		
		
		// "Callback" for the Cancel button.
		$scope.cancelEdit = function() {
			// Navigate to the /uiProduct route (Product List page).
			$location.url("/uiProduct");
		}
	}
);
