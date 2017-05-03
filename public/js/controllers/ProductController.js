// Name: ProductController.js
// Description: The AngularJS controller for the Product Details template
// (ProductDetails.html).
//
// History:
// Edward Wang   4/21/2017  Created.
'use strict';

merchantApp.controller('ProductController',
	function ProductController($scope, $routeParams, productData, $log, $location) {
		// Field validation patterns.
		$scope.dimensionPat = '^\\d*(\\.|\\.\\d{1,2})?$';
		$scope.weightPat    = '^\\d*(\\.|\\.\\d{1,2})?$';
		$scope.moneyPat     = '^\\d*\\.\\d\\d$';

		// Get data for the selected product via AJAX.
		$scope.response = productData.getProduct($routeParams.productId);
		
		// "Callback" for the Save button.		
		$scope.saveProduct = function(product, productForm) {
			if(productForm.$valid) {
				productData.update(product)
					.$promise
					.then(function(response) { 
						$log.log('success', response)
						// Once the save succeeds, navigate to the /uiProduct
						// route (Product List page).
						$location.url("/uiProduct");
					})
					.catch(function(response) { 
						$log.log('failure', response)
					});
			}
		};		

		// "Callback" for the Delete button.
		$scope.deleteProduct = function(product, productForm) {
			productData.delete(product.id)
			.$promise
			.then(function(response) { 
				$log.log('success', response)
				// Once the save succeeds, navigate to the /uiProduct
				// route (Product List page).
				$location.url("/uiProduct");
			})
			.catch(function(response) { 
				$log.log('failure', response)
			});
		};		

		// "Callback" for the Cancel button.
		$scope.cancelEdit = function() {
			$location.url("/uiProduct");
		}
	}
);
