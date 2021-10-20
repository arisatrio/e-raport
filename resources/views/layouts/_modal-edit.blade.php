<div class="modal fade" id="modal-edit-{{$item->id}}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data {{$data}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" id="form-upload-preview" method="POST" action="{{ route($route, $item->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    @if($data === 'Tahun Ajaran')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Tahun Ajaran</label>
                            <input type="text" class="form-control col-sm-8" name="tahun_ajaran" value="{{$item->tahun_ajaran}}">
                        </div>
                    @elseif($data === 'Jurusan')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Jurusan</label>
                            <input type="text" class="form-control col-sm-8" name="jurusan" value="{{$item->jurusan}}">
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Kode Jurusan</label>
                            <input type="text" class="form-control col-sm-8" name="kode_jurusan" value="{{$item->kode_jurusan}}">
                        </div>
                    @elseif ($data === 'Kelas')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Tahun Ajaran</label>
                            <select class="form-control col-sm-8" name="m_tahun_ajarans_id">
                                <option selected disabled>--Tahun Ajaran--</option>
                                @foreach ($ta as $tajar)
                                <option @if ($tajar->id === $itemTahun_ajaran) selected @endif value="{{$tajar->id}}">{{$tajar->tahun_ajaran}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Jurusan</label>
                            <select class="form-control col-sm-8" name="m_jurusans_id">
                                <option selected disabled>--Jurusan--</option>
                                @foreach ($jurusan as $jur)
                                <option @if ($jur->id === $itemJurusan) selected @endif value="{{$jur->id}}">{{$jur->jurusan}} ({{$jur->kode_jurusan}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Kelas</label>
                            <select class="form-control col-sm-8" name="kelas">
                                <option selected disabled>--Kelas--</option>
                                <option @if ($item->kelas === '10') selected @endif value="10">10</option>
                                <option @if ($item->kelas === '11') selected @endif value="11">11</option>
                                <option @if ($item->kelas === '12') selected @endif value="12">12</option>
                            </select>
                        </div>
                    @endif
                    {{-- <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">{{$array['labelField1']}}</label>
                        <input type="text" class="form-control col-sm-8" name="{{$array['nameField1']}}" value="{{$array['valueField1']}}">
                    </div>
                    @if (count($array) > 5)
                    <div class="form-group row">
                        <label for="email1" class="col-sm-4 control-label col-form-label">{{$array['labelField2']}}</label>
                        <input type="text" class="form-control col-sm-8" name="{{$array['nameField2']}}" value="{{$array['valueField2']}}">
                    </div>
                    @endif --}}
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