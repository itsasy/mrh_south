@section('header')

<div class="container-fluid">
    <div class="row">
        <div class="col-2" style="background-color: rgb(17, 0, 110)">Logo</div>
        @if ($title ?? null)
        <div class="col-9 text-center">
            <h1>{{$title}}</h1>
        </div>
        @endif
    </div>
</div>

@endsection