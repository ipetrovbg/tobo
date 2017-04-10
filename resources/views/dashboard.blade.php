@extends('layout.app')

<!-- title -->
@section('title', "Dashboard - Tobo Ltd.")

<!-- styles -->
@section('styles')
    <link rel="stylesheet" href="{{ url('/') }}/css/tobo-area-map.cmponent.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/panel.component.css">
@endsection

<!-- content -->
@section('content')
<div class="container" ng-app="tobo" ng-controller="DasboardController as $ctrl">
    <top-menu></top-menu>
    <content>
       <grid column="col-md-12">
           <panel type="default" heading="'Dashboard'">
                <tobo-area-map 
                image-src="'http://localhost:8000/uploads/2017/3/18/w0bWC7wcwJ0rgGJl5HYAMYcoSUBd8SGJE3ipMMoZ.jpeg'">
                </tobo-area-map>
           </panel>            
        </grid>
    </content>    
</div>
@endsection

<!-- scripts -->
@section('scripts')
    <script type="text/javascript" src="{{ url('/') }}/js/app/services/coords.service.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/app/components/tobo-area-map/tobo-area-map.component.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/app/components/upload/upload.component.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/app/components/content/content.component.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/app/components/grid/grid.component.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/app/components/panel/panel.component.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/app/controllers/dashboard/dashboard.controller.js"></script>
@endsection