// Name: ProductListController.js
// Description: The AngularJS controller for the Product List template
// (ProductList.html).
//
// History:
// Edward Wang   4/20/2017  Created.
'use strict';

merchantApp.controller('ProductListController',
	function ProductListController($scope, $location, productData) {
		// Get data for all the products via AJAX.
		$scope.response = productData.getAllProducts();
		
		// "Callback" for the Cancel button.		
		$scope.open = function (product)
		{
			// Navigate to the /uiProduct/:productId route (Product page).
			$location.url('/uiProduct/' + product.id);
		}
	}
);
