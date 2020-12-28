<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">¿Estás seguro?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="#" method="POST" id="delete_form">
                @method('DELETE')
                @csrf
                <div class="modal-body">
                    ¿Realmente estás seguro de eliminar estos datos? Este proceso no se puede deshacer. Por favor confirme su decisión pulsando en uno de los botones:
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>

        </div>
    </div>
</div>


@section('scripts')
<script src="{{asset('js/actions/delete_confirm.js')}}"></script>
@endsection