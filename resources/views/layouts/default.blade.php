<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('includes.head')
    </head>
    <body>   
        
        @include('includes.header')
        

        @yield('content')

        
        @include('includes.footer')
    

    </div>
    </body>
</html>
