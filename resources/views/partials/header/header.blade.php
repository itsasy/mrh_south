@if(request()->route()->getName() != 'mainTaster')
<div class="container-fluid">
    <div class="row">
        <div class="col-2" style="background-color: rgb(17, 0, 110)">Logo</div>
        <div class="col-9 text-center">
            <h1>@yield('title')</h1>
        </div>
    </div>
</div>

@else

<div class="container-fluid">
    <div class="row">
        <div class="col-2" style="background-color: rgb(17, 0, 110)">Logo</div>
        <div class="col-9 text-center">
            <h1>{{auth()->user()->nombres . ' ' . auth()->user()->apellidos}}</h1>
        </div>
    </div>
</div>

@endif