<div class="modal fade" id="modal-delete-{{$item->id}}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data {{$data}} {{$itemDel}}?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="{{ route($route, $item->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-primary bg-kaneza">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>