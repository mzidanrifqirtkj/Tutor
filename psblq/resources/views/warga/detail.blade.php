@extends('layouts.layout')
@section('content')
<div class="p-3 mb-2 bg-white text-dark">
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-profil" role="tabpanel">
            <div class="row">
                <div class="col-md-4">
                    <h4>Profil Warga</h4>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col">
                    <a href="{{ url('warga/edit/'. $data->warga_id)}}" class="ml-2 float-right btn btn-md btn-outline-secondary btn-icon-text" title="Detail Siswa">
                        Edit <i class="mdi mdi-file-check btn-icon-append"></i>
                    </a>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td class="bg-light">Nama</td>
                                <td>{{ $data->nama_warga}}</td>
                            </tr>
                            <tr>
                                <td class="bg-light">NIK</td>
                                <td>{{ $data->nik}}</td>
                            </tr>
                            <tr>
                                <td class="bg-light">No KK</td>
                                <td>{{ $data->no_kk}}</td>
                            </tr>
                            <tr>
                                <td class="bg-light">Jenis Kelamin</td>
                                <td>
                                    @if($data->jenis_kelamin=='l')
                                    Laki-laki
                                    @else
                                    Perempuan
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="bg-light">Tempat Lahir</td>
                                <td>{{ $data->tempat_lahir}}</td>
                            </tr>
                            <tr>
                                <td class="bg-light">Tanggal Lahir</td>
                                <td>{{ $data->tanggal_lahir}}</td>
                            </tr>
                            <tr>
                                <td class="bg-light">Agama</td>
                                <td>{{ $data->agama->nama_agama}}</td>
                            </tr>
                            <tr>
                                <td class="bg-light">RT</td>
                                <td>{{ $data->rt_id}}</td>
                            </tr>
                         {{--   <tr>
                                <td class="bg-light">Pendidikan</td>
                                <td>{{ $data->pendidikan->pendidikan}}</td>
                            </tr> --}}
                            <tr>
                                <td class="bg-light">Golongan Darah</td>
                                <td>{{ $data->golongan_darah}}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascripts')
@endsection