{{-- Uso en cualquier vista: @include('partials.alerts.warning') --}}
@if(Session::has('warning'))
<div class="col-12 mt-4">
    <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
        <strong>¡Warning!</strong> {{Session::get('warning')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif