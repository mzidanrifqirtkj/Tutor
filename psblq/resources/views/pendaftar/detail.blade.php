@extends('layouts.layout')

@section('content')
<div class="p-3 mb-2 bg-white text-dark">
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-profil" role="tabpanel">
            <div class="row">
                <div class="col-md-5">
                    <h4>Detail Pendaftar</h4>
                </div>
                <div class="col-md-5">
                </div>
                <div class="col">
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-center">
                        <figure class="figure">
                            @if ($pendaftar->gambar != '')
                            <img src="{{ $pendaftar->gambar }}" class="figure-img img-fluid rounded"
                                alt="default-image">
                            @else
                            <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Default-welcomer.png"
                                class="figure-img img-fluid rounded" alt="default-image">
                            @endif
                        </figure>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="table-responsive col-md-12">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="bg-light">Nama Lengkap</td>
                                    <td>{{ $pendaftar->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">NIK</td>
                                    <td>{{ $pendaftar->nik }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">No. KK</td>
                                    <td>{{ $pendaftar->no_kk }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Jenis Kelamin</td>
                                    <td>
                                        @if ($pendaftar->jenis_kelamin == 'L')
                                        Laki-Laki
                                        @elseif ($pendaftar->jenis_kelamin == 'P')
                                        Perempuan
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Tempat Lahir</td>
                                    <td>{{ $pendaftar->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Tempat Lahir</td>
                                    <td>{{ tanggal($pendaftar->tanggal_lahir) }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">NISN</td>
                                    <td>{{ $pendaftar->nisn }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">No. Telepon</td>
                                    <td>{{ $pendaftar->no_telp }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Alamat Santri</td>
                                    <td>
                                        @if ($pendaftar->provinsi)
                                        {{ $pendaftar->provinsi->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($pendaftar->kabupaten)
                                        {{ $pendaftar->kabupaten->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($pendaftar->kecamatan)
                                        {{ $pendaftar->kecamatan->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($pendaftar->kelurahan)
                                        {{ $pendaftar->kelurahan->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bg-light">RT/ RW</td>
                                    <td>{{ $pendaftar->rt }}/ {{ $pendaftar->rw }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Alamat Lengkap</td>
                                    <td>{{ $pendaftar->alamat }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Kode Pos</td>
                                    <td>{{ $pendaftar->kode_pos }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Golongan Darah</td>
                                    <td>{{ $pendaftar->golongan_darah }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Pendidikan Formal Terakhir</td>
                                    <td>
                                        @if ($pendaftar->pendidikan_terakhir_santri)
                                        {{ $pendaftar->pendidikan_terakhir_santri->pendidikan }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Pendidikan NonFormal Terakhir</td>
                                    <td>{{ $pendaftar->pendidikan_non_formal }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Organisasi yang Pernah diikuti</td>
                                    <td>{{ $pendaftar->organisasi }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Jabatan di Organisasi yang Pernah diikuti</td>
                                    <td>{{ $pendaftar->jabatan }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Prestasi yang pernah diraih</td>
                                    <td>{{ $pendaftar->prestasi }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Foto</td>
                                    <td><img src="{{ $pendaftar->gambar }}" alt="Belum Mengupload Foto" width="300"
                                            height="300"></td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Foto KK</td>
                                    <td><img src="{{ $pendaftar->gambar_kk }}" alt="Belum Mengupload KK" width="300"
                                            height="300"></td>
                                </tr>
                                <tr>
                                    <td class="bg-light">No. KIP</td>
                                    <td>{{ $pendaftar->no_kip }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">No. KKS</td>
                                    <td>{{ $pendaftar->no_kks }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">No. PKH</td>
                                    <td>{{ $pendaftar->no_pkh }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection