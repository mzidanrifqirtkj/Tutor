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
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-center">
                        <figure class="figure">
                            @if ($santri->gambar != '')
                            <img src="{{ $santri->gambar }}" class="figure-img img-fluid rounded" alt="default-image">
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
                                    <td>{{ $santri->nama }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">NIK</td>
                                    <td>{{ $santri->nik }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">No. KK</td>
                                    <td>{{ $santri->no_kk }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Jenis Kelamin</td>
                                    <td>
                                        @if ($santri->jenis_kelamin == 'L')
                                        @elseif ($santri->jenis_kelamin == 'P')
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Tempat Lahir</td>
                                    <td>{{ $santri->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Tempat Lahir</td>
                                    <td>{{ tanggal($santri->tanggal_lahir) }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">NISN</td>
                                    <td>{{ $santri->nisn }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">No. Telepon</td>
                                    <td>{{ $santri->no_telp }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Alamat Santri</td>
                                    <td>
                                        @if ($santri->provinsi)
                                        {{ $santri->provinsi->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($santri->kabupaten)
                                        {{ $santri->kabupaten->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($santri->kecamatan)
                                        {{ $santri->kecamatan->name }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($santri->kelurahan)
                                        {{ $santri->kelurahan->name }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bg-light">RT/RW</td>
                                    <td>{{ $santri->rt }}/ {{ $santri->rw }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Alamat Lengkap</td>
                                    <td>{{ $santri->alamat }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Kode Pos</td>
                                    <td>{{ $santri->kode_pos }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Golongan Darah</td>
                                    <td>{{ $santri->golongan_darah }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Pendidikan Formal Terakhir</td>
                                    <td>{{ $santri->pendidikan_terakhir }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Pendidikan Non Formal Terakhir</td>
                                    <td>{{ $santri->pendidikan_nonformal }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Organisasi yang Pernah diikuti</td>
                                    <td>{{ $santri->organisasi }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Jabatan di Organisasi yang Pernah diikuti</td>
                                    <td>{{ $santri->jabatan }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Prestasi yang pernah diraih</td>
                                    <td>{{ $santri->prestasi }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Foto</td>
                                    <td><img src="{{ $santri->gambar }}" alt="Belum Mengupload Foto" width="150"
                                            height="150"></td>
                                </tr>
                                <tr>
                                    <td class="bg-light">Foto KK</td>
                                    <td><img src="{{ $santri->gambar_kk }}" alt="Belum Mengupload KK" width="300"
                                            height="300"></td>
                                </tr>
                                <tr>
                                    <td class="bg-light">No. KIP</td>
                                    <td>{{ $santri->no_kip }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">No. KKS</td>
                                    <td>{{ $santri->no_kks }}</td>
                                </tr>
                                <tr>
                                    <td class="bg-light">No. PKH</td>
                                    <td>{{ $santri->no_pkh }}</td>
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