<div class="modal fade" id="modal-create" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data {{$data}} </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" id="form-upload-preview" method="POST" action="{{ route($route) }}">
                @csrf
                <div class="modal-body">
                    @if ($data === 'Jurusan')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Nama Jurusan</label>
                            <input type="text" class="form-control col-sm-8" name="jurusan" required>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Kode Jurusan</label>
                            <input type="text" class="form-control col-sm-8" name="kode_jurusan" required>
                        </div>
                    @elseif($data === 'Tahun Ajaran')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Tahun Ajaran</label>
                            <input type="text" class="form-control col-sm-8" name="tahun_ajaran" required>
                        </div>
                    @elseif ($data === 'Kelas')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Tahun Ajaran</label>
                            <select class="form-control col-sm-8" name="m_tahun_ajarans_id">
                                <option selected disabled>--Tahun Ajaran--</option>
                                @foreach ($ta as $item)
                                <option value="{{$item->id}}">{{$item->tahun_ajaran}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Jurusan</label>
                            <select class="form-control col-sm-8" name="m_jurusans_id">
                                <option selected disabled>--Jurusan--</option>
                                @foreach ($jurusan as $item)
                                <option value="{{$item->id}}">{{$item->jurusan}} ({{$item->kode_jurusan}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Kelas</label>
                            <select class="form-control col-sm-8" name="kelas">
                                <option selected disabled>--Kelas--</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <div class="form-group mb-0 float-right">
                        <button type="button" class="btn btn-dark waves-effect waves-light" data-dismiss="modal" aria-label="Close">Batal</button>
                        <button type="submit" id="btn-upload-preview" class="btn btn-info bg-kaneza waves-effect waves-light">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>