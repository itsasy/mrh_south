<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >

<head>
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('images/LOGO_MRH.png')}}" />
    <meta charset="utf-8" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('font-awesome-4.7.0/css/font-awesome.css')}}">

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
                    <li>
                        <a  href="{{route('mainAdmin')}}">
                            <i class="fa fa-home fa-4x"></i>
                            <p>Inicio</p>
                        </a>

                    </li>
                    <li>
                        <a href="{{route('manageTest')}}">
                            <i class="fa fa-file fa-4x"></i>
                            <p>Administración de pruebas</p>
                        </a>
                        <ul style="list-style-type: none;">
                            <li>
                                <a href="{{route('test.create')}}">
                                    <i class="fa fa-plus fa-4x"></i>
                                    <p>Crear prueba</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('test.index')}}">
                                    <i class="fa fa-edit fa-4x"></i>
                                    <p>Editar prueba</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('preparation.index')}}">
                                    <i class="fa fa-pencil fa-4x"></i>
                                    <p>Preparación de prueba</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('results.index')}}">
                                    <i class="fa fa-table fa-4x"></i>
                                    <p>Resultados de prueba</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('manageTaster')}}">
                            <i class="fa fa-users fa-4x"></i>
                            <p>Administración de jueces</p>
                        </a>
                        <ul style="list-style-type: none;">
                            <li>
                                <a href="{{route('taster.create')}}">
                                    <i class="fa fa-user-plus fa-4x"></i>
                                    <p>Crear juez</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('taster.index')}}">
                                    <i class="fa fa-user fa-4x"></i>
                                    <p>Editar juez</p>
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="{{route('cerrar-sesion')}}">
                            <i class="fa fa-sign-out fa-4x"></i>
                            <p>Cerrar sesión</p>
                        </a>
                    </li>

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
                        </script>, Diseñado por <a href="https://www.getbyteperu.com/" target="_blank">Getbyte</a>. 
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!--Core JS Files-->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!--  Google Maps Plugin    -->
    <script src="{{asset('js/now-ui-dashboard.min.js?v=1.5.0')}}" type="text/javascript"></script>
    <script src="{{asset('js/demo.js')}}"></script>
    
    <script type="text/javascript">
        $(".nav li").on("click", function(){
        console.log("val");
           $(".nav").find(".active").removeClass("active");
           $(this).addClass("active");
        });
     
        function descargar() {
            
           consle.log("REALIZADO");
            
        }
    </script>
    @yield('scripts')
</body>

</html>