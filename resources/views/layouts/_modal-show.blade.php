<div class="modal fade" id="modal-detail-{{$item->id}}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail {{$data}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($data === 'Tahun Ajaran')
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">Tahun Ajaran</label>
                        <input type="text" class="form-control col-sm-8" value="{{$item->tahun_ajaran}}" disabled>
                    </div>
                @elseif($data === 'Jurusan')
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">Jurusan</label>
                        <input type="text" class="form-control col-sm-8" value="{{$item->jurusan}}" disabled>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">Kode Jurusan</label>
                        <input type="text" class="form-control col-sm-8" value="{{$item->kode_jurusan}}" disabled>
                    </div>
                @elseif($data === 'Kelas')
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">Tahun Ajaran</label>
                        <input type="text" class="form-control col-sm-8" value="{{$item->tahunAjaran->tahun_ajaran}}" disabled>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">Jurusan</label>
                        <input type="text" class="form-control col-sm-8" value="{{$item->jurusan->jurusan}}" disabled>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">Kelas</label>
                        <input type="text" class="form-control col-sm-8" value="{{$item->kelas}}" disabled>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>