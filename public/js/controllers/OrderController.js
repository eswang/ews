// Name: OrderController.js
// Description: The AngularJS controller for the Order Details template
// (OrderDetails.html).
//
// History:
// Edward Wang   5/01/2017  Created.
'use strict';

merchantApp.controller('OrderController',
	function OrderController($scope, $routeParams, orderData, $log, $location) {
		// Field validation patterns.
		$scope.streetAddrPat = '^[\\w\\s\\.-]*$';
		$scope.cityPat = '^[a-zA-Z\\s\\.-]*$';
		$scope.statePat = '^[A-Z]{2}$';
		$scope.zipcodePat = '^\\d{5}(-\\d{4})?$';
		$scope.phonePat = '^[\\d\\s-)(x]*$';
		$scope.numberPat = '^\\d*$'

		$scope.message = null;
		
		// Get data for the selected order via AJAX.
		$scope.response = orderData.getOrder($routeParams.orderId);
		
		// "Callback" for the Save button.		
		$scope.saveOrder = function(order, orderForm) {
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
							$scope.message = response.data.msg;
						}
						$log.log('failure', response)
					});
			}
		};		

		// "Callback" for the Delete button.
		$scope.deleteOrder = function(order, orderForm) {
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
					$scope.message = response.data.msg;
				}
				$log.log('failure', response)
			});
		};		

		// "Callback" for the Cancel button.
		$scope.cancelEdit = function() {
			$location.url("/uiOrder");
		}
	}
);
