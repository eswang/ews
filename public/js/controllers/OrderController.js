// Name: OrderController.js
// Description: The AngularJS controller for the Order Details template
// (OrderDetails.html).
//
// History:
// Edward Wang   5/01/2017  Created.
'use strict';

merchantApp.controller('OrderController',
	function OrderController($scope, $routeParams, orderData, productData, $log, $location) {
		// Field validation patterns.
		$scope.streetAddrPat = '^[\\w\\s\\.-]*$';
		$scope.cityPat = '^[a-zA-Z\\s\\.-]*$';
		$scope.statePat = '^[A-Z]{2}$';
		$scope.zipcodePat = '^\\d{5}(-\\d{4})?$';
		$scope.phonePat = '^[\\d\\s-)(x]*$';
		$scope.numberPat = '^\\d*$'

		// On screen (error) message.
		$scope.message = null;
		
		// Do not show the product details section by default.
		$scope.showProduct = false;
		
		// Get data for the selected order via AJAX.
		$scope.response = orderData.getOrder($routeParams.orderId);
		
		// Data for order's product will go here (retrieved via AJAX later).
		$scope.responseProduct = null;
		
		// "Callback" for the Save button.
		$scope.saveOrder = function(order, orderForm) {
			// Update the order.
			if(orderForm.$valid) {
				orderData.update(order)
					.$promise
					.then(function(response) {
						$log.log('success', response)
						// Once the save succeeds, navigate to the /uiOrder
						// route (Order List page).
						$location.url("/uiOrder");
					})
					.catch(function(response) {
						if (response && 
							response.data && 
							response.data.msg)
						{
							// Display error message.
							$scope.message = response.data.msg;
						}
						$log.log('failure', response)
					});
			}
		};		

		// "Callback" for the Delete button.
		$scope.deleteOrder = function(order, orderForm) {
			// Delete the order.
			orderData.delete(order.id)
			.$promise
			.then(function(response) { 
				$log.log('success', response)
				// Once the save succeeds, navigate to the /uiOrder
				// route (Order List page).
				$location.url("/uiOrder");
			})
			.catch(function(response) { 
				if (response && 
					response.data && 
					response.data.msg)
				{
					// Display error message.
					$scope.message = response.data.msg;
				}
				$log.log('failure', response)
			});
		};		

		// "Callback" for the Cancel button.
		$scope.cancelEdit = function() {
			// Navigate to the /uiOrder route (Order List page).
			$location.url("/uiOrder");
		};
		
		// "Callback" for the Show Details button.
		$scope.showProductDetails = function() {
			if ($scope.response &&
				$scope.response.order &&
				$scope.response.order.product_id)
			{
				// Get the product information for the given product ID.
				productData.getProduct($scope.response.order.product_id)
				.$promise
				.then(function(response){
					// Display the production information in the product
					// details section.
					$scope.responseProduct = response;
					// Display the product details section.
					$scope.showProduct = true;
					// Undisplay any error message.
					$scope.message = null;
					$log.log('success', response);
				})
				.catch(function(response){
					if (response && 
						response.data && 
						response.data.msg)
					{
						// Display error message.
						$scope.message = response.data.msg;
					}
					// Hide the product details section.
					$scope.showProduct = false;
					$log.log('failure', response)
				});
			}
		};
		
		// "Callback for the Hide button.
		$scope.hideProductDetails = function() {
			// Hide the product details section.
			$scope.showProduct = false;
		};
	}
);
