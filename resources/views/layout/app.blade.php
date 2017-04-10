<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/node_modules/bootstrap/dist/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/top-menu.component.css">
        <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/general.css">
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        
        <!-- Styles -->
       @yield('styles')

    </head>

    <body>
        <div class="main-container">
            @yield('content')
        </div>

        <script type="text/javascript" src="{{ url('/') }}/node_modules/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="{{ url('/') }}/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{ url('/') }}/node_modules/angular/angular.min.js"></script>
        <script type="text/javascript" src="{{ url('/') }}/js/config.js"></script>

         @if(Auth::check())
        <script>
            window.tobo.user = {!! json_encode( Auth::user() ) !!};            
        </script>
         @endif
          @if(!Auth::check())
        <script>
            window.tobo.user = false;            
        </script>
         @endif

        <script>
            window.tobo.url = {!! json_encode(url( '/' )) !!};
        </script>

        <script type="text/javascript" src="{{ url('/') }}/js/app/app.js"></script>
        <script type="text/javascript" src="{{ url('/') }}/node_modules/angucomplete-alt/dist/angucomplete-alt.min.js"></script>
        <!-- core module -->
        <script type="text/javascript" src="{{ url('/') }}/js/app/core/core.module.js"></script>
        <script type="text/javascript" src="{{ url('/') }}/js/app/core/core.constants.js"></script>

        <script type="text/javascript" src="{{ url('/') }}/js/app/services/core.services.module.js"></script>
        

        <!-- components module -->
        <script src="{{ url('/') }}/node_modules/angular-file-upload/dist/angular-file-upload.min.js"></script>
        <script type="text/javascript" src="{{ url('/') }}/js/app/components/components.module.js"></script>
        <script type="text/javascript" src="{{ url('/') }}/js/app/components/top-menu/top-menu.component.js"></script>
        <script type="text/javascript" src="{{ url('/') }}/js/app/controllers/controllers.module.js"></script>
       

        @yield('scripts')
    </body>
</html>
