{{-- Uso en cualquier vista: @include('partials.alerts.error') --}}
@if(Session::has('error'))
<div class="col-12 mt-4">
    <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
        <strong>¡Error!</strong> {{Session::get('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif