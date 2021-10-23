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
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Semester</label>
                            <select class="form-control col-sm-8" name="semester">
                                <option selected disabled>--Semester--</option>
                                <option @if ($item->semester === 'Ganjil') selected @endif value="Ganjil">Ganjil</option>
                                <option @if ($item->semester === 'Genap') selected @endif value="Genap">Genap</option>
                            </select>
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
                            <label for="email1" class="col-sm-4 control-label col-form-label">Jurusan</label>
                            <select class="form-control col-sm-8" name="m_jurusans_id">
                                <option selected disabled>--Jurusan--</option>
                                @foreach ($jurusan as $jur)
                                <option @if ($jur->id === $item->jurusan->id) selected @endif value="{{$jur->id}}">{{$jur->jurusan}} ({{$jur->kode_jurusan}})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Tingkat Kelas</label>
                            <select class="form-control col-sm-8" name="tingkat">
                                <option selected disabled>--TIngkat Kelas--</option>
                                <option @if ($item->tingkat === '10') selected @endif value="10">10</option>
                                <option @if ($item->tingkat === '11') selected @endif value="11">11</option>
                                <option @if ($item->tingkat === '12') selected @endif value="12">12</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Ruangan</label>
                            <select class="form-control col-sm-8" name="ruangan">
                                <option selected disabled>--Ruangan--</option>
                                <option @if ($item->ruangan === 'A') selected @endif value="A">A</option>
                                <option @if ($item->ruangan === 'B') selected @endif value="B">B</option>
                                <option @if ($item->ruangan === 'C') selected @endif value="C">C</option>
                            </select>
                        </div>
                    @elseif ($data === 'Mata Pelajaran Umum')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Golongan</label>
                            <select class="form-control col-sm-8" name="golongan">
                                <option selected disabled>--Golongan--</option>
                                <option @if ($item->golongan === 'A. Muatan Nasional') selected @endif value="A. Muatan Nasional">A. Muatan Nasional</option>
                                <option @if ($item->golongan === 'B. Muatan Kewilayahan') selected @endif value="B. Muatan Kewilayahan">B. Muatan Kewilayahan</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Mata Pelajaran</label>
                            <input type="text" class="form-control col-sm-8" name="mapel" value="{{$item->mapel}}" required>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">KKM</label>
                            <input type="number" class="form-control col-sm-8" name="kkm" value="{{$item->kkm}}" required>
                        </div>
                    @elseif ($data === 'Mata Pelajaran Kejuruan')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Jurusan</label>
                            <select class="form-control col-sm-8" name="m_jurusans_id">
                                <option selected disabled>--Jurusan--</option>
                                @foreach ($jurusan as $jur)
                                <option @if ($jur->id === $item->m_jurusans_id) selected @endif value="{{$jur->id}}">{{$jur->jurusan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Golongan</label>
                            <select class="form-control col-sm-8" name="golongan">
                                <option selected disabled>--Golongan--</option>
                                <option @if ($item->golongan === 'C1. Dasar Bidang Keahlian') selected @endif value="C1. Dasar Bidang Keahlian">C1. Dasar Bidang Keahlian</option>
                                <option @if ($item->golongan === 'C2. Dasar Program Keahlian') selected @endif  value="C2. Dasar Program Keahlian">C2. Dasar Program Keahlian</option>
                                <option @if ($item->golongan === 'C3. Kompetensi Keahlian') selected @endif value="C3. Kompetensi Keahlian">C3. Kompetensi Keahlian</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Mata Pelajaran</label>
                            <input type="text" class="form-control col-sm-8" name="mapel" required value="{{$item->mapel}}">
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Tingkat</label>
                            <select class="form-control col-sm-8" name="tingkat">
                                <option selected disabled>--Tingkat--</option>
                                <option @if ($item->tingkat === 'X') selected @endif value="X">X</option>
                                <option @if ($item->tingkat === 'XI') selected @endif value="XI">XI</option>
                                <option @if ($item->tingkat === 'XII') selected @endif value="XII">XII</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">KKM</label>
                            <input type="number" class="form-control col-sm-8" name="kkm" value="{{$item->kkm}}" required>
                        </div>
                    @elseif ($data === 'Ekstrakulikuler')
                        <div class="form-group row">
                            <label for="email1" class="col-sm-4 control-label col-form-label">Ekstrakulikuler</label>
                            <input type="text" class="form-control col-sm-8" name="nama_eskul" value="{{$item->nama_eskul}}" required>
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