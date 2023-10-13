@extends('layouts.layout')

@section('content')
    <style>
        th,
        td {
            padding: 20px;
            text-align: center;
        }
    </style>
    <div class="row">
        <div class="col-3col-md-3 col-lg-3">
            <a href="{{ url('pendaftar?jenis_kelamin=') }}">
                {{-- <div class="card-header  text-white text-center"> Total Pendaftar </div> --}}
                <div class="card card-body text-center" style="border-radius: 10px">
                    <h4>Total Pendaftar</h4>
                    <h2 class="text-dark">{{ $jumlahsemua }}</h2>
                </div>
            </a>
        </div>
        <div class="col-3 col-md-3 col-lg-3">
            <a href="{{ url('pendaftar?jenis_kelamin=L') }}">
                {{-- <div class="card-header  text-white text-center"></div> --}}
                <div class="card card-body text-center" style="border-radius: 10px">
                    <h4>Santri Putra</h4>
                    <h2 class="text-dark">{{ $jumlahlaki }}</h2>
                </div>
            </a>
        </div>
        <div class="col-3 col-md-3 col-lg-3">
            <a href="{{ url('pendaftar?jenis_kelamin=P') }}">
                {{-- <div class="card-header  text-white text-center">Total Putri</div> --}}
                <div class="card card-body text-center" style="border-radius: 10px">
                    <h4>Santri Putri</h4>
                    <h2 class="text-dark">{{ $jumlahperempuan }}</h2>
                </div>
            </a>
        </div>
        <div class="col-3 col-md-3 col-lg-3">
            <a href="{{ url('pendaftar?status_sowan=Y') }}">
                {{-- <div class="card-header  text-white text-center">Total Sowan</div> --}}
                <div class="card card-body text-center" style="border-radius:10px">
                    <h4>Santri Sowan</h4>
                    <h2 class="text-dark">{{ $jumlahsowan }}</h2>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card" style="border-radius: 10px">
                <div class="row card-header">
                    <div class="col-6 mt-2">
                        <h4 style="color:#3F4B36 !important">Daftar Pendaftar</h4>
                    </div>
                    <div class="col-6 mt-2 text-end">
                        <a href="{{ url('pendaftar/downloadexcel') }}" class="btn btn-success">Download Excel</a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row justify-content-center mb-1">
                        <div class="col-12">
                            <form id="form-laporan-ringkasan" action="" method="get" style="padding: 5px">
                                <div class="row g-3 input-group">
                                    <div class="col-sm-3">
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select">
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option {{ $jenis_kelamin == 'L' ? 'selected' : '' }} value="L">Laki-Laki
                                            </option>
                                            <option {{ $jenis_kelamin == 'P' ? 'selected' : '' }} value="P">Perempuan
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <select name="status_sowan" id="status_sowan" class="form-select">
                                            <option value="">Pilih Status Sowan</option>
                                            <option {{ $status_sowan == 'Y' ? 'selected' : '' }} value="Y">Sudah Sowan
                                            </option>
                                            <option {{ $status_sowan == 'N' ? 'selected' : '' }} value="N">Belum Sowan
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="input-group" style="width:100%">
                                            <input type="text" class="form-control" id="q" name="q"
                                                value="{{ $q }}" placeholder="Cari Berdasarkan nama"
                                                style="width: 85%">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">Filter</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row mb-4">
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
                            <thead style="background-color: #3f4b36;color:aliceblue">
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Email</th>
                                    <th>Nama</th>
                                    <th>jenis kelamin</th>
                                    <th>Nomer Hp</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendaftar as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($item->gambar != '')
                                                <img src="{{ $item->gambar }}" alt="" width="120"
                                                    height="160">
                                            @else
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Default-welcomer.png"
                                                    class="figure-img img-fluid rounded" width="120" height="160"
                                                    alt="default-image">
                                            @endif
                                        </td>
                                        <td>{{ $item->user->email }}</td>
                                        <td>{{ $item->nama }}</td>
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
                                            @if ($item->sudah_sowan == 'N')
                                                <small class="btn btn-sm btn-warning text-dark"
                                                    style="width: 100%">Belum</small>
                                            @else
                                                <small class="btn btn-sm btn-success text-white"
                                                    style="width: 100%">Sudah</small>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('pendaftar/' . $item->id_pendaftar . '/detail') }}"
                                                class="btn btn-info" style="width: 100%; margin-bottom:2px">Detail</a>
                                            @if ($item->jenis_kelamin != '')
                                                @if ($item->sudah_sowan == 'N')
                                                    <a href="{{ url('pendaftar/' . $item->id_pendaftar . '/proses_setelah_sowan') }}"
                                                        class="btn btn-warning"
                                                        style="width: 100%;margin-bottom:2px">Proses</a>
                                                @endif
                                            @endif
                                            @if ($item->sudah_sowan == 'N')
                                                <a href="{{ url('pendaftar/' . $item->id_pendaftar . '/delete') }}"
                                                    class="btn btn-danger" style="width: 100%;margin-bottom:2px">Hapus</a>
                                                {{-- <a href="{{ url('pendaftar/' . $item->id_pendaftar . '/edit') }}"
                                        class="btn btn-warning">Edit</a> --}}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Pagination --}}
                    <div class="d-flex justify-content-center">
                        {!! $pendaftar->withQueryString()->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
