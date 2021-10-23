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
                        <label for="email1" class="col-sm-4 control-label col-form-label">Jurusan</label>
                        <input type="text" class="form-control col-sm-8" value="{{$item->jurusan->jurusan}}" disabled>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">Tingkat Kelas</label>
                        <input type="text" class="form-control col-sm-8" value="{{$item->tingkat}}" disabled>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">Ruangan</label>
                        <input type="text" class="form-control col-sm-8" value="{{$item->ruangan}}" disabled>
                    </div>
                @elseif($data === 'Mata Pelajaran Umum')
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">Golongan</label>
                        <input type="text" class="form-control col-sm-8" name="golongan" value="{{$item->golongan}}" disabled>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control col-sm-8" name="mapel" value="{{$item->mapel}}" disabled>
                    </div>
                @elseif($data === 'Mata Pelajaran Kejuruan')
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">Jurusan</label>
                        <input type="text" class="form-control col-sm-8" name="jurusan" value="{{$item->mapelJurusan->jurusan}}" disabled>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">Golongan</label>
                        <input type="text" class="form-control col-sm-8" name="golongan" value="{{$item->golongan}}" disabled>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control col-sm-8" name="mapel" value="{{$item->mapel}}" disabled>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">Tingkat</label>
                        <input type="text" class="form-control col-sm-8" name="tingkat" value="{{$item->tingkat}}" disabled>
                    </div>
                @elseif($data === 'Ekstrakulikuler')
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">Ekstrakulikuler</label>
                        <input type="text" class="form-control col-sm-8" name="nama_eskul" value="{{$item->nama_eskul}}" disabled>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>