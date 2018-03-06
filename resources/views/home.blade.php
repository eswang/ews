@extends('layouts.app')

@section('content')
    <!-- ng-view is where we will display the templates for this site. -->
    <ng-view>
    </ng-view>
@endsection

@section('scripts')
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
@endsection