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
<div class="container" ng-app="tobo" ng-controller="BuildingController as $ctrl">
    <top-menu></top-menu>
    <content>
       <grid column="col-md-8 col-md-offset-2">
           <panel type="default" heading="'New Building'">
                 <form name="form" novalidate>
                     <!--<pre>
                        <span ng-bind="form.$submitted | json"></span>
                     </pre>-->
                     
                        <div class="form-group" 
                        ng-class="{'has-success': form.$submitted && !form.name.$error.required, 'has-warning' : form.$submitted && form.name.$error.required }">
                            <label for="buildingName" class="form-control-label">*Name</label>
                            <input 
                            type="text"
                            required="" 
                            ng-class="{'form-control-success': form.$submitted && !form.name.$error.required, 'form-control-warning' : form.$submitted && form.name.$error.required }"
                            ng-model="$ctrl.building.name" 
                            name="name" 
                            class="form-control" 
                            id="buildingName" 
                            placeholder="Name">
                            <div 
                            ng-class="{'text-success': form.$submitted && !form.name.$error.required, 'text-warning' : form.$submitted && form.name.$error.required }"
                            ng-if="form.$submitted && form.name.$error.required" 
                            >
                            Building name is required!</div>
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="buildingDescription">Description</label>
                            <textarea                            
                            ng-model="$ctrl.building.description" 
                            name="description" 
                            class="form-control" 
                            placeholder="Description" 
                            id="buildingDescription" 
                            rows="3">
                            </textarea>
                    </div>
                    <div class="">
                        <button type="submit" ng-click="$ctrl.saveBuilding(form)" class="btn btn-primary pull-right">Submit</button>
                    </div>
                 </form>
           </panel>            
        </grid>
    </content>    
</div>
@endsection

<!-- scripts -->
@section('scripts')
    <script type="text/javascript" src="{{ url('/') }}/js/app/components/content/content.component.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/app/components/grid/grid.component.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/app/components/panel/panel.component.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/app/controllers/building/building.controller.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/js/app/services/building.service.js"></script>
@endsection