<!DOCTYPE html>
<!-- ng-app specifies the Angular module to use for this page (js/app.js)-->
<html lang="en" ng-app="merchantApp">
<head>
<!-- base tag is necessary when using HTML 5 routing. href tell Angular what
	directory to start parsing URLs. -->
<base href="/"/>
<meta charset="utf-8">
<title>Products</title>
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
<link rel="stylesheet" href="{{asset('css/app.css')}}"/>
</head>
<body>
<div class="container">
	<div class="navbar" ng-controller="MainMenuController">
		<div class="navbar-inner">
			<ul class="nav">
				<li><a href="#" ng-click="listProducts()">Product List</a></li>
				<li><a href="#" ng-click="createProduct()">New Product</a></li>
			</ul>
		</div>
	</div>
	
	<!-- ng-view is where we will display the templates for this site. -->
	<ng-view>
	</ng-view>

</div>

<!-- Bootstrap -->
<script src="{{asset('lib/bootstrap.min.js')}}"></script>

<!-- AngularJS -->
<script src="{{asset('lib/angular/angular.js')}}"></script>
<!--  AngularJS $resource module -->
<script src="{{asset('lib/angular/angular-resource.js')}}"></script>
<!--  AngularJS route module -->
<script src="{{asset('lib/angular/angular-route.min.js')}}"></script>

<!-- This where we actually do stuff -->
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/controllers/MainMenuController.js')}}"></script>
<script src="{{asset('js/controllers/ProductListController.js')}}"></script>
<script src="{{asset('js/controllers/ProductController.js')}}"></script>
<script src="{{asset('js/controllers/NewProductController.js')}}"></script>
<script src="{{asset('js/services/ProductData.js')}}"></script>

</body>
</html>