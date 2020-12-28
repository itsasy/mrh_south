
<div class="panel-header panel-header-bg">
    <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid" style="justify-content: center;">
        <div class="navbar-wrapper">

            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
           <span class="navbar-toggler-bar bar1"></span>
           <span class="navbar-toggler-bar bar2"></span>
           <span class="navbar-toggler-bar bar3"></span>
         </button>
            </div>
            @if(request()->route()->getName() != 'mainTaster')

            <a class="navbar-brand" style="font-size: 40px;">@yield('title')</a> @else

            <a class="navbar-brand" style="font-size: 40px;">{{auth()->user()->nombres . ' ' . auth()->user()->apellidos}}</a> @endif

        </div>

    </div>
</nav>
    <canvas id="bigDashboardChart"></canvas>
</div>