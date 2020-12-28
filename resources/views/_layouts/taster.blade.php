<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('images/LOGO_MRH.png')}}" />

    <meta charset="utf-8" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/now-ui-dashboard.css?v=1.5.0')}}">
    <link rel="stylesheet" href="{{asset('css/demo.css')}}"> @yield('style')


</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="yellow">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <img src="{{asset('images/LOGO_MRH.png')}}" alt="Girl in a jacket" width="240" height="130">
            </div>
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li class="active ">
                        <a  href="{{route('mainTaster')}}">
                            <i class="fa fa-home fa-4x"></i>
                            <p>Inicio</p>
                        </a>

                    </li>
                    @if(isset(auth()->user()->id_usuario))

                    <li>
                        <a href="{{route('evaluation.index')}}">
                            <i class="fa fa-file fa-4x"></i>
                            <p>Evaluar prueba</p>
                        </a>
                      
                    </li>
                    <li>
                        <a href="{{route('results.Taster')}}">
                            <i class="fa fa-users fa-4x"></i>
                            <p>Resultados de prueba</p>
                        </a>
                    

                    </li>
                    <li>
                        <a href="{{route('cerrar-sesion')}}">
                            <i class="fa fa-sign-out fa-4x"></i>
                            <p>Cerrar sesión</p>
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{route('cerrar-sesion')}}">
                            <i class="fa fa-sign-out fa-4x"></i>
                            <p>Salir</p>
                        </a>
                    </li>
                    @endif

                </ul>
            </div>
        </div>
        <!-- Navbar -->
        <div class="main-panel" id="main-panel">
           @include('partials.header.header')
            <!-- End Navbar -->

            <div class="content">
               
               @yield('content')
                       
            </div>

            <footer class="footer">
                <div class=" container-fluid ">
                 
                    <div class="copyright" id="copyright">
                        &copy;
                        <script>
                            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                        </script>, Designed by <a href="https://www.getbyte.com" target="_blank">Getbyte</a>. 
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <script src="{{asset('js/erfect-scrollbar.jquery.min.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <script src="{{asset('js/now-ui-dashboard.min.js?v=1.5.0')}}" type="text/javascript"></script>
    <script src="{{asset('js/demo.js')}}"></script>

    @yield('scripts')
</body>

</html>