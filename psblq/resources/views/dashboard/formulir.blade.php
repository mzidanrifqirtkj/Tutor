@extends('layouts.layout')

@section('content')


    <div style="font-size:14px">
        <h5
            style="text-align: center; font-weight: 700;
            font-size: 100%;
            line-height: 15px;
            ">
            FORMULIR PENDAFTARAN SANTRI BARU <br>
            PONDOK PESANTREN SALAF API ALLUQMANIYYAH <br>
            YOGYAKARTA <br><br><br></h5>
        <ol> <strong> Persyaratan Umum: </strong>
            <li>Usia Minimal 15 tahun</li>
            <li>Belum Berkeluarga</li>
        </ol>
        <ol><strong>Persyaratan berkas File-File yang diupload:</strong>
            <li>Foto Pribadi 3×4</li>
            <li>Foto Kartu Keluarga</li>
        </ol>
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="pendaftar_name">Nama Lengkap</label>
                                <input type="text" required
                                    class="form-control  @error('pendaftar') is-invalid @enderror" name="nama"
                                    id="nama" value="{{ $pendaftar->nama }}"
                                    placeholder="Nama sesuai dengan KTP, akta kelahiran, Kartu Keluarga">
                                @error('pendaftar')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" maxlength="16" minlength="16" required
                                    class="form-control  @error('nik') is-invalid @enderror" name="nik" id="nik"
                                    value="{{ old('nik') ?? $pendaftar->nik }}"
                                    placeholder="Sesuai dengan yang terdapat di Kartu Keluarga atau Kartu Tanda Penduduk">
                                @error('nik')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="no_kk">No. KK</label>
                                <input type="text" required class="form-control  @error('no_kk') is-invalid @enderror"
                                    name="no_kk" id="no_kk" value="{{ old('no_kk') ?? $pendaftar->no_kk }}"
                                    placeholder="Sesuai dengan yang terdapat di Kartu Keluarga">
                                @error('no_kk')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select required name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option {{ $pendaftar->jenis_kelamin == 'L' ? 'selected' : '' }} value="L">
                                        Laki-Laki
                                    </option>
                                    <option {{ $pendaftar->jenis_kelamin == 'P' ? 'selected' : '' }} value="P">
                                        Perempuan
                                    </option>
                                </select>
                            </div><br>

                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" maxlength="50" required
                                    class="form-control  @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                                    id="tempat_lahir" value="{{ old('tempat_lahir') ?? $pendaftar->tempat_lahir }}"
                                    placeholder="Kabupaten kelahiran">
                                @error('tempat_lahir')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" required
                                    class="form-control  @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
                                    id="tanggal_lahir" value="{{ $pendaftar->tanggal_lahir }}"
                                    placeholder="Silakan pilih tanggal lahir">
                                @error('tanggal_lahir')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" maxlength="13" required class="form-control"
                                    @error('nisn') is-invalid @enderror name="nisn" id="nisn"
                                    value="{{ $pendaftar->nisn }}" placeholder="Sesuai data Kemendikbud">
                                @error('nisn')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="no_telp">No. Telepon</label>
                                <input type="text" required class="form-control  @error('no_telp') is-invalid @enderror"
                                    maxlength="15" name="no_telp" id="no_telp" value="{{ $pendaftar->no_telp }}"
                                    placeholder="+628231234567">
                                @error('no_telp')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror

                            </div><br><br><br>
                            <hr>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-10">
                                    <select required onchange="changeProvinsi(this)" name="kd_provinsi" id="kd_provinsi"
                                        class="form-control mt-3">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($provinsi as $i => $item)
                                            @if ($pendaftar->kd_provinsi != null || $pendaftar->kd_provinsi != 0)
                                                <option value="{{ $item->id }}"
                                                    {{ $pendaftar->kd_provinsi == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}">
                                                    {{ $item->name }}
                                            @endif

                                            </option>
                                        @endforeach
                                        <script>
                                            function changeProvinsi(this) {
                                                alert("The input value has changed. The new value is: " + );
                                            }
                                        </script>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kabupaten</label>
                                <div class="col-sm-10">
                                    <select required onchange="changeKabupaten(this)" name="kd_kabupaten"
                                        id="kd_kabupaten" class="form-control mt-3">
                                        <option value="">Pilih Kabupaten</option>
                                        @foreach ($kabupaten as $i => $item)
                                            @if ($pendaftar->kd_kabupaten != null || $pendaftar->kd_kabupaten != 0)
                                                <option value="{{ $item->id }}"
                                                    {{ $pendaftar->kd_kabupaten == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <select required onchange="changeKecamatan(this)" name="kd_kecamatan"
                                        id="kd_kecamatan" class="form-control mt-3">
                                        <option value="">Pilih Kecamatan</option>
                                        @foreach ($kecamatan as $i => $item)
                                            @if ($pendaftar->kd_kecamatan != null || $pendaftar->kd_kecamatan != 0)
                                                <option value="{{ $item->id }}"
                                                    {{ $pendaftar->kd_kecamatan == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kelurahan</label>
                                <div class="col-sm-10 ">
                                    <select required name="kd_kelurahan" id="kd_kelurahan" class="form-control mt-3">
                                        @if ($pendaftar->kd_kelurahan != null || $pendaftar->kd_kelurahan != 0)
                                            @if ($kelurahan)
                                                <option value="{{ $pendaftar->kd_kelurahan }}"
                                                    {{ $pendaftar->kd_kelurahan == $kelurahan->id ? 'selected' : '' }}>
                                                    {{ $kelurahan->name }}</option>
                                            @endif
                                        @else
                                            <option value="">Pilih Kelurahan</option>
                                        @endif
                                    </select>
                                </div>
                            </div><br>

                            <div class="form-group">
                                <label for="rt">RT</label>
                                <input type="text" required class="form-control  @error('rt') is-invalid @enderror"
                                    name="rt" id="rt" value="{{ $pendaftar->rt }}"
                                    placeholder="Silakan ketik">
                                @error('rt')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="rw">RW</label>
                                <input type="text" required class="form-control  @error('rw') is-invalid @enderror"
                                    name="rw" id="rw" value="{{ $pendaftar->rw }}"
                                    placeholder="Silakan ketik">
                                @error('rw')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="alamat">Alamat Lengkap</label>
                                <textarea type="text" required class="form-control  @error('alamat') is-invalid @enderror" name="alamat"
                                    id="alamat" value="{{ $pendaftar->alamat }}"
                                    placeholder="Masukkan nomor, jalan, gang tempat tinggal sekarang">{{ $pendaftar->alamat }}</textarea>
                                @error('alamat')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="kode_pos">Kode Pos</label>
                                <input type="text" required
                                    class="form-control  @error('kode_pos') is-invalid @enderror" name="kode_pos"
                                    id="kode_pos" value="{{ $pendaftar->kode_pos }}"
                                    placeholder="Masukkan Kode Pos Tempat Anda Tinggal">
                                @error('kode_pos')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br><br><br>
                            <hr>
                            <div class="form-group">
                                <label for="golongan_darah">Golongan Darah</label>
                                <input type="text" required
                                    class="form-control  @error('golongan_darah') is-invalid @enderror"
                                    name="golongan_darah" id="golongan_darah" value="{{ $pendaftar->golongan_darah }}"
                                    placeholder="Masukkan Golongan Darah Anda">
                                @error('golongan_darah')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <small style="padding: 0 15px"> (nb : Jika Tidak Tahu, Tulis Tidak Tahu.)</small><br><br>
                            <div class="form-group">
                                <label for="pendidikan_terakhir">Pendidikan Formal Terakhir</label>
                                <select class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                    <option value="">Pilih pendidikan</option>
                                    @foreach ($pendidikan as $item)
                                        <option
                                            {{ $pendaftar->pendidikan_terakhir == $item->pendidikan_id ? 'selected' : '' }}
                                            value="{{ $item->pendidikan_id }}">{{ $item->pendidikan }}</option>
                                    @endforeach
                                </select>
                                @error('pendidikan_terakhir')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="tahun_lulus">Tahun Lulus</label>
                                <select name="tahun_lulus" class="form-control" id="tahun_lulus">
                                    <option value="">Pilih Tahun Lulus</option>
                                    @for ($i = 2023; $i >= 2000; $i--)
                                        @if ($i == $pendaftar->tahun_lulus)
                                            <option selected value="{{ $i }}">{{ $i }}
                                            </option>
                                        @else
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endif
                                    @endfor
                                </select>
                                @error('tahun_lulus')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="pendidikan_non_formal">Pendidikan Non Formal Sebelumnya</label>
                                <input type="text" required
                                    class="form-control  @error('pendidikan_non_formal') is-invalid @enderror"
                                    name="pendidikan_non_formal" id="pendidikan_non_formal"
                                    value="{{ $pendaftar->pendidikan_non_formal }}"
                                    placeholder="Pondok Pesantren/Asrama/Boarding School">
                                @error('pendidikan_non_formal')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="organisasi">Organisasi Yang Pernah Diikuti </label>
                                <textarea type="text" required class="form-control  @error('organisasi') is-invalid @enderror" name="organisasi"
                                    cols="20" rows="3" id="organisasi" value="{{ $pendaftar->organisasi }}"
                                    placeholder="Osis, Pramuka, Rohis, dsb.">{{ $pendaftar->organisasi }}</textarea>
                                @error('organisasi')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                                <small style="padding: 0 15px"> (nb : Jika Tidak Ada, Tulis Tidak Ada. Jika Banyak, Pisah
                                    dengan Tanda Koma)</small>
                            </div><br>
                            <div class="form-group">
                                <label for="jabatan">Jabatan di Organisasi Yang Pernah Diikuti </label>
                                <textarea required class="form-control  @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan"
                                    value="{{ $pendaftar->jabatan }}" placeholder="Ketua Osis, Sekretaris Rohis, Anggota Osis">{{ $pendaftar->jabatan }}</textarea>
                                @error('jabatan')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                                <small style="padding: 0 15px"> (nb : Jika Tidak Ada, Tulis Tidak Ada. Jika Banyak, Pisah
                                    dengan Tanda Koma)</small>
                            </div><br>

                            <div class="form-group">
                                <label for="prestasi">Prestasi yang Pernah diraih</label>
                                <textarea type="text" required class="form-control  @error('prestasi') is-invalid @enderror" name="prestasi"
                                    id="prestasi" cols="20" rows="3" value="{{ $pendaftar->prestasi }}"
                                    placeholder="Juara 1 MTQ/Juara 2 Hadroh/Juara 3 MQK, dsb.">{{ $pendaftar->prestasi }}</textarea>
                                @error('prestasi')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>


                            <div class="form-group mt-4">
                                <img src="{{ $pendaftar->gambar }}" style="width: 20%; height: 80%;"
                                    class="img-preview-gambar img-fluid mb-3 col-sm-5" class="form-control"
                                    alt="">
                            </div><br>
                            <div class="form-control">
                                <label class="">Upload Photo Pendaftar (3x4)</label>
                                <div class="input-group col-xs-12">
                                    <input required accept="image/png, image/gif, image/jpeg, image/jpg" type="file"
                                        onchange="previewImage()" name="gambar" id="gambar"
                                        class="file-upload-browse btn btn-inverse-info">
                                </div>
                            </div><br>
                            <div class="form-group mt-4">
                                <img src="{{ $pendaftar->gambar_kk }}" style="width: 20%; height: 80%;"
                                    class="img-preview-gambar-kk img-fluid mb-3 col-sm-5" alt="">
                            </div>
                            <div class="form-control">
                                <label>Upload Photo KK Pendaftar</label>
                                <div class="input-group col-xs-12">
                                    <input required type="file" onchange="previewImageKK()"
                                        accept="image/png, image/gif, image/jpeg, image/jpg" name="gambar_kk"
                                        id="gambar_kk" class="file-upload-browse btn btn-inverse-info">
                                </div>
                            </div><br>
                            <div class="form-group mt-3">
                                <label for="no_kip">No. KIP (Kosongi Jika Tidak Ada)</label>
                                <input type="text" class="form-control  @error('no_kip') is-invalid @enderror"
                                    name="no_kip" id="no_kip" value="{{ $pendaftar->no_kip }}"
                                    placeholder="Masukkan Nomor Kartu Indonesia Pintar">
                                @error('no_kip')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="no_kks">No. KKS (Kosongi Jika Tidak Ada)</label>
                                <input type="text" class="form-control  @error('no_kks') is-invalid @enderror"
                                    name="no_kks" id="no_kks" value="{{ $pendaftar->no_kks }}"
                                    placeholder="Masukkan Nomor Kartu Keluarga Sejahtera">
                                @error('no_kks')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="no_pkh">No. PKH (Kosongi Jika Tidak Ada)</label>
                                <input type="text" class="form-control  @error('no_pkh') is-invalid @enderror"
                                    name="no_pkh" id="no_pkh" value="{{ $pendaftar->no_pkh }}"
                                    placeholder="Masukkan Nomor Kartu Program Keluarga Harapan">
                                @error('no_pkh')
                                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                                @enderror
                            </div><br>
                            <button type="submit" class="btn btn-sm btn-color-theme mt-2">Selanjutnya</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('javascripts')
        <script>
            function previewImage() {
                const image = document.querySelector('#gambar');
                const imgPreview = document.querySelector('.img-preview-gambar');

                imgPreview.style.display = 'block';

                const ofReader = new FileReader();
                ofReader.readAsDataURL(image.files[0]);

                ofReader.onload = function(oFRevent) {
                    imgPreview.src = oFRevent.target.result;
                }
            }

            function previewImageKK() {
                const image = document.querySelector('#gambar_kk');
                const imgPreview = document.querySelector('.img-preview-gambar-kk');

                imgPreview.style.display = 'block';

                const ofReader = new FileReader();
                ofReader.readAsDataURL(image.files[0]);

                ofReader.onload = function(oFRevent) {
                    imgPreview.src = oFRevent.target.result;
                }
            }

            function changeProvinsi(dd) {
                console.log(dd.value);
                const id = dd.value;
                var settings = {
                    url: base_url("dashboard/kabupaten") + "/" + id,
                    type: "GET",
                    timeout: timeOut(),
                };
                $.ajax(settings)
                    .done(function(response) {
                        $("#kd_kabupaten").empty();
                        console.log(response.data);
                        response.data.forEach((element) => {
                            $("#kd_kabupaten").append(
                                '<option value="' +
                                element.id +
                                '">' +
                                element.name +
                                "</option>"
                            );
                        });
                    })
                    .fail(function(data, status, error) {
                        if (status == "timeout") {
                            CekKonfirmasi("Timeout!", "");
                        } else if (data.responseJSON.status == false) {
                            CekKonfirmasi("gagal", "");
                        } else {
                            console.log(data.responseJSON);
                        }
                    });
            }

            function changeKabupaten(dd) {
                const id = dd.value;
                var settings = {
                    url: base_url("dashboard/kecamatan") + "/" + id,
                    type: "GET",
                    timeout: timeOut(),
                };
                $.ajax(settings)
                    .done(function(response) {
                        $("#kd_kecamatan").empty();
                        console.log(response.data);
                        response.data.forEach((element) => {
                            $("#kd_kecamatan").append(
                                '<option value="' +
                                element.id +
                                '">' +
                                element.name +
                                "</option>"
                            );
                        });
                    })
                    .fail(function(data, status, error) {
                        if (status == "timeout") {
                            CekKonfirmasi("Timeout!", "");
                        } else if (data.responseJSON.status == false) {
                            CekKonfirmasi("gagal", "");
                        } else {
                            console.log(data.responseJSON);
                        }
                    });
            }

            function changeKecamatan(dd) {
                const id = dd.value;
                var settings = {
                    url: base_url("dashboard/kelurahan") + "/" + id,
                    type: "GET",
                    timeout: timeOut(),
                };
                $.ajax(settings)
                    .done(function(response) {
                        $("#kd_kelurahan").empty();
                        console.log(response.data);
                        response.data.forEach((element) => {
                            $("#kd_kelurahan").append(
                                '<option value="' +
                                element.id +
                                '">' +
                                element.name +
                                "</option>"
                            );
                        });
                    })
                    .fail(function(data, status, error) {
                        if (status == "timeout") {
                            CekKonfirmasi("Timeout!", "");
                        } else if (data.responseJSON.status == false) {
                            CekKonfirmasi("gagal", "");
                        } else {
                            console.log(data.responseJSON);
                        }
                    });
            }
        </script>
    @endsection
