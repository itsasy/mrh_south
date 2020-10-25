@php
use App\Models\TestType;

$testType = TestType::all();
@endphp

<div class="form-group col-12 justify-content-between mb-2">
    <label class="col-8 col-sm-5 justify-content-start" for="type_of_test">Tipo de prueba</label>
    <div class="row">
        <div class="form-check form-check-inline">
            @foreach($testType as $key => $type)
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="check_lista[]" id=""
                    value="{{$type->id_tipo_prueba}}" {{-- @if(isset($sample))
                    {{$sample[$key]->id_tipo_prueba == $type->id_tipo_prueba ? 'checked' : ''}} @endif --}}>
                {{$type->tipo}}
            </label>
            @endforeach
        </div>
    </div>
</div>