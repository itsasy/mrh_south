<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{asset('images/LOGO_MRH.png')}}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('DataTables/datatables.min.css')}}">

    @yield('style')
</head>

<body>
    <div>
          <div class="logo" style="text-align: -webkit-center;">
                <img src="{{asset('images/LOGO_MRH.png')}}"  width="300" height="190">
            </div>
    </div>
    <div class="container">

        @yield('content')

    </div>


    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    @yield('scripts')

</body>


</html>