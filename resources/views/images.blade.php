@extends('layout.app')

<!-- title -->
@section('title', "Images - Tobo Ltd.")

<!-- styles -->
@section('styles')

@endsection

<!-- content -->
@section('content')
<div class="container" ng-app="tobo">
 <top-menu></top-menu>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default tobo-panel-default">
                <div class="panel-heading tobo-panel-heading">Images</div>

                <div class="panel-body">
                    <images></images>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- scripts -->
@section('scripts')
    <script type="text/javascript" src="{{ url('/') }}/js/app/components/images/images.component.js"></script>
@endsection