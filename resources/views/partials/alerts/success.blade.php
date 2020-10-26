{{-- Uso en cualquier vista: @include('partials.alerts.success') --}}
@if(Session::has('success'))
<div class="col-12 mt-4">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>¡Éxito!</strong> {{Session::get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif