<!DOCTYPE html>
<!-- ng-app specifies the Angular module to use for this page (js/app.js)-->
<html lang="en" ng-app="merchantApp">
<head>
<!-- base tag is necessary when using HTML 5 routing. href tell Angular what
	directory to start parsing URLs. -->
<base href="/"/>
<meta charset="utf-8">
<title>Products</title>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/app.css"/>
</head>
<body>
<div class="container">
	<div class="navbar" ng-controller="MainMenuController">
		<div class="navbar-inner">
			<ul class="nav">
				<li><a href="#" ng-click="listProducts()">Product List</a></li>
				<li><a href="#" ng-click="createProduct()">New Product</a></li>
				<li><a href="#" ng-click="listOrders()">Order List</a></li>
				<li><a href="#" ng-click="createOrder()">New Order</a></li>
			</ul>
		</div>
	</div>
	
	<!-- ng-view is where we will display the templates for this site. -->
	<ng-view>
	</ng-view>

</div>

<!-- Bootstrap -->
<script src="lib/bootstrap.min.js"></script>

<!-- AngularJS -->
<script src="lib/angular/angular.js"></script>
<!--  AngularJS $resource module -->
<script src="lib/angular/angular-resource.js"></script>
<!--  AngularJS route module -->
<script src="lib/angular/angular-route.min.js"></script>

<!-- This where we actually do stuff -->
<script src="js/app.js"></script>
<script src="js/controllers/MainMenuController.js"></script>
<script src="js/controllers/ProductListController.js"></script>
<script src="js/controllers/ProductController.js"></script>
<script src="js/controllers/NewProductController.js"></script>
<script src="js/controllers/OrderListController.js"></script>
<script src="js/controllers/OrderController.js"></script>
<script src="js/controllers/NewOrderController.js"></script>
<script src="js/services/ProductData.js"></script>
<script src="js/services/OrderData.js"></script>

</body>
</html>