<style>
    .table .thead-dark th {
        background-color: #21840b;
    }

    .table-random {
        background: none;
        border: none;
        display: inline-block;
        width: 30px;
        color: black;
        outline: none;
    }

    .alert {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }
</style>
<div class="container pt-5">
    <form action="{{route('duotrio.store')}}" method="POST">
        @csrf
        <div class="row">
            <input type="text" class="table-random" name="nro_repeticiones" value="{{$choiceTestSample->nro_repeticiones}} " hidden/>
            <input type="text" class="table-random" name="nro_ensayos_muestras" value="{{$choiceTestSample->nro_ensayos_muestras}}" hidden />
            <input type="text" class="table-random" name="id_eleccion_prueba_muestra" value="{{$choiceTestSample->id_eleccion_prueba_muestra}}" hidden />

            @for ($i = 0; $i < $choiceTestSample->nro_repeticiones; $i++) <div class="col-12 col-md-4">
                <table class="table text-center shadow">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Ensayo</th>
                            <th scope="col">Par de Muestras</th>
                            <th scope="col">Igual a P</th>
                            <th scope="col" hidden></th>
                        </tr>
                    </thead>
                    <tbody class="text-secondary">
                        @for ($j = 0; $j < $choiceTestSample->nro_ensayos_muestras; $j++) <tr>
                            <td><input type="text" class="table-random" name="ensayo_id[{{$i}}][{{$j}}]" value="{{$j + 1}}"
                                    readonly /></td>
                            <td>
                                <input type="text" class="table-random" name="muestra1_valores[{{$i}}][{{$j}}]"
                                    value="{{$muestra1 = mt_rand(100, 999)}}" readonly /> -
                                <input type="text" class="table-random" name="muestra2_valores[{{$i}}][{{$j}}]"
                                    value="{{$muestra2 = mt_rand(100, 999)}}" readonly />
                            </td>
                            @php
                            $random = array($muestra1, $muestra2);
                            $igual_p = array_rand($random);
                            @endphp
                            <td>
                                <input type="text" class="table-random" name="igual_p[{{$i}}][{{$j}}]" value="{{$random[$igual_p]}}"
                                    readonly />
                            </td>
                            <td hidden>
                                <input type="hidden" class="table-random" name="repeticion_id[]" value="{{$i + 1}}"
                                    readonly />
                            </td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
        </div>
        @endfor
</div>
  @include('partials.buttons.cancel_or_accept')
</form>
</div>