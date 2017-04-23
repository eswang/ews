// Name: app.js
// Description: The AngularJS appliction is created here.  Contains routes.
//
// History:
// Edward Wang   4/20/2017  Created.
'use strict';

// We need the ngResource module so we can use $resource in this app.
// We need the ngRoute module so we can use routing.
var merchantApp = angular.module('merchantApp', ['ngResource', 'ngRoute'])

	// config() will return a module so it can be chained.
	// The controller for the template is also specified here.
	// Use $routeProvider to add routes.
	.config(function($routeProvider, $locationProvider) {
		// New Product page.
		$routeProvider.when('/uiNewProduct',
			{
				templateUrl: 'templates/NewProduct.html',
				controller: 'NewProductController'
			});
		// Product List page.
		$routeProvider.when('/uiProduct',
			{
				templateUrl: 'templates/ProductList.html',
				controller: 'ProductListController'
			});
		// Product page.
		$routeProvider.when('/uiProduct/:productId',
			{
				templateUrl: 'templates/ProductDetails.html',
				controller: 'ProductController',
			});
		// Default - goto Product List page.
		$routeProvider.otherwise({redirectTo: '/uiProduct'});
		
		// Use HTML5 routing (no # in URLs).
		$locationProvider.html5Mode(true);
	});
