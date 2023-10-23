@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="row card-header" style="color: #fff !important;">
                <div class="col-6 mt-2">
                    <h4 style="color:#3F4B36 !important">Daftar Santri</h4>
                </div>
                <div class="col-6 mt-2 text-end">
                    <a href="{{ url('santri/downloadexcel') }}" class="btn btn-success">Download Excel</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row justify-content-end mb-4">
                    <div class="col-md-5">
                        <form id="form-laporan-ringkasan" action="" method="get">
                            <div class="input-group">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option {{ $jenis_kelamin=='L' ? 'selected' : '' }} value="L">Laki-Laki
                                    </option>
                                    <option {{ $jenis_kelamin=='P' ? 'selected' : '' }} value="P">Perempuan
                                    </option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Nis</th>
                                <th>jenis kelamin</th>
                                <th>Nomer Hp</th>
                                <th>Provinsi</th>
                                <th>Kabupaten</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($item->gambar != '')
                                    <img src="{{ $item->gambar }}" alt="" width="120" height="160">
                                    @else
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Default-welcomer.png"
                                        class="figure-img img-fluid rounded" width="120" height="160"
                                        alt="default-image">
                                    @endif
                                </td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nis }}</td>
                                <td>
                                    @if ($item->jenis_kelamin == 'L')
                                    Laki-Laki
                                    @elseif ($item->jenis_kelamin == 'P')
                                    Perempuan
                                    @endif
                                </td>
                                <td>{{ $item->no_telp }}</td>
                                <td>
                                    @if ($item->provinsi)
                                    {{ $item->provinsi->name }}
                                    @endif
                                </td>
                                <td>
                                    @if ($item->kabupaten)
                                    {{ $item->kabupaten->name }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('santri/' . $item->id_santri . '/edit') }}" class="btn btn-warning"
                                        style="width: 100%; margin-bottom: 2px">Edit</a>
                                    <a href="{{ url('santri/' . $item->id_santri . '/detail') }}" class="btn btn-info"
                                        style="width: 100%; margin-bottom: 2px">Detail</a>
                                    <a href="{{ url('santri/' . $item->id_santri . '/ubah_status') }}"
                                        class="btn btn-danger" style="width: 100%; margin-bottom: 2px">Non aktifkan</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascripts')
@endsection