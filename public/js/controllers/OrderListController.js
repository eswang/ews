// Name: OrderListController.js
// Description: The AngularJS controller for the Order List template
// (OrderList.html).
//
// History:
// Edward Wang   5/01/2017  Created.
'use strict';

merchantApp.controller('OrderListController',
	function OrderListController($scope, $location, orderData) {
		// Get data for all the orders via AJAX.
		$scope.response = orderData.getAllOrders();
		
		// "Callback" for the clicking an order in the table.
		$scope.open = function (order)
		{
			// Navigate to the /uiOrder/:orderId route (Order page).
			$location.url('/uiOrder/' + order.id);
		}
	}
);
