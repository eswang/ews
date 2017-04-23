// Name: ProductListController.js
// Description: Creation of the productData service.
//
// Note that $resource requires the ngResource module and the
// the angular/angular-resource.js file.
//
// History:
// Edward Wang   4/20/2017  Created.
merchantApp.factory('productData', function($resource) {
	// $resource takes in the URL for a RESTful service.
	// We added a couple new actions (getAll, update) to "resource" that we
	// will use below; we specify the HTTP method to use and whether the
	// expected response will be an (JSON) array.
	var resource = $resource('/product/:id', {id:'@id'}, {"getAll":{method: "GET", isArray:false}, "update":{method: "PUT"}});
	return{
		getProduct: function(productId) {
			return resource.get({id:productId});
		},
		save: function(product) {
			return resource.save(product);
		},
		update: function(product) {
			return resource.update(product);
		},
		delete: function(productId) {
			return resource.delete({id:productId})
		},
		getAllProducts: function() {
			return resource.getAll();
		}
	};
});
