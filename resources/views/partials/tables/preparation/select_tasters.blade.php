<div class="form-group col-12">
    <label for="catadores_selected">Seleccionar catadores</label>
    <div class="input-container">
        <select class="ui fluid search dropdown" multiple="" name="catadores_selected[]" id="catadores_selected"
            required="required">
            <option value="" disabled="disabled">Catadores expertos</option>
            @foreach (range(1,10) as $range)
            <option value="{{$range}}">{{$range}}</option>
            @endforeach
        </select>
    </div>
</div>

@section('style')
<link rel="stylesheet" href="{{asset('css/judge-picker/semantic.css')}}">
@endsection

@section('scripts')
<script src="{{asset('js/judge-picker/semantic.js')}}"></script>
<script>
    $('.ui.fluid.search.dropdown')
    .dropdown({
      maxSelections:10
    });
</script>
@endsection