// Name: OrderListController.js
// Description: Creation of the orderData service.
//
// Note that $resource requires the ngResource module and the
// the angular/angular-resource.js file.
//
// History:
// Edward Wang   5/01/2017  Created.
merchantApp.factory('orderData', function($resource) {
	// $resource takes in the URL for a RESTful service.
	// We added a couple new actions (getAll, update) to "resource" that we
	// will use below; we specify the HTTP method to use and whether the
	// expected response will be an (JSON) array.
	var resource = $resource('/order/:id', {id:'@id'}, {"getAll":{method: "GET", isArray:false}, "update":{method: "PUT"}});
	return{
		getOrder: function(orderId) {
			return resource.get({id:orderId});
		},
		save: function(order) {
			return resource.save(order);
		},
		update: function(order) {
			return resource.update(order);
		},
		delete: function(orderId) {
			return resource.delete({id:orderId})
		},
		getAllOrders: function() {
			return resource.getAll();
		}
	};
});
