@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="">
                <div class="card-header">

                </div>
                <div class="card-body" style="padding: 30px">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" maxlength="50" required class="form-control" @error('nama_ayah') is-invalid @enderror
                                name="nama_ayah" id="nama_ayah" value="{{ $pendaftar->nama_ayah }}"
                                placeholder="Silakan ketik">
                            @error('nama_ayah')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="nik_ayah">NIK Ayah</label>
                            <input type="text" maxlength="16" required class="form-control"
                                @error('nik_ayah') is-invalid @enderror name="nik_ayah" id="nik_ayah"
                                value="{{ $pendaftar->nik_ayah }}" placeholder="Silakan ketik">
                            @error('nik_ayah')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="alamat_ayah">Alamat Ayah</label>
                            <textarea class="form-control" name="alamat_ayah" id="alamat_ayah" cols="15" rows="3" required
                                @error('alamat_ayah') is-invalid @enderror value="{{ $pendaftar->alamat_ayah }}"
                                placeholder="Masukkan nomor, jalan, gang tempat tinggal sekarang">{{ $pendaftar->alamat_ayah }}</textarea>
                            @error('alamat_ayah')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="pendidikan_terakhir_ayah">Pendidikan Terakhir Ayah</label>
                            <select class="form-control" name="pendidikan_terakhir_ayah" id="pendidikan_terakhir_ayah">
                                <option value="">Pilih pendidikan</option>
                                @foreach ($pendidikan as $item)
                                    <option
                                        {{ $pendaftar->pendidikan_terakhir_ayah == $item->pendidikan_id ? 'selected' : '' }}
                                        value="{{ $item->pendidikan_id }}">{{ $item->pendidikan }}</option>
                                @endforeach
                            </select>
                            @error('pendidikan_terakhir_ayah')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="no_telp_ayah">No. Telepon Ayah</label>
                            <input type="text" maxlength="15" required class="form-control"
                                @error('no_telp_ayah') is-invalid @enderror name="no_telp_ayah" id="no_telp_ayah"
                                value="{{ $pendaftar->no_telp_ayah }}" placeholder="+6282345451234">
                            @error('no_telp_ayah')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                            <input type="text"  maxlength="50" required class="form-control"
                                @error('pekerjaan_ayah') is-invalid @enderror name="pekerjaan_ayah" id="pekerjaan_ayah"
                                value="{{ $pendaftar->pekerjaan_ayah }}"
                                placeholder="Wiraswasta/ Dosen/ Guru / Yang lain.">
                            @error('pekerjaan_ayah')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="penghasilan_ayah">Penghasilan Ayah</label>
                            <select class="form-control" name="penghasilan_ayah" id="penghasilan_ayah">
                                <option value="">Pilih Penghasilan</option>
                                @foreach ($penghasilan as $item)
                                    <option {{ $pendaftar->penghasilan_ayah == $item->id ? 'selected' : '' }}
                                        value="{{ $item->id }}">{{ $item->range_nominal }}</option>
                                @endforeach
                            </select>
                            @error('penghasilan_ayah')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br><br><br>
                        <hr>
                        <div class="form-group">
                            <label for="nama_ibu">Nama ibu</label>
                            <input type="text"  maxlength="50" required class="form-control" @error('nama_ibu') is-invalid @enderror
                                name="nama_ibu" id="nama_ibu" value="{{ $pendaftar->nama_ibu }}"
                                placeholder="Nama sesuai dengan KTP, akta kelahiran, Kartu Keluarga">
                            @error('nama_ibu')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="nik_ibu">NIK ibu</label>
                            <input type="text"  maxlength="16" minlength="16" required class="form-control"
                                @error('nik_ibu') is-invalid @enderror name="nik_ibu" id="nik_ibu"
                                value="{{ $pendaftar->nik_ibu }}"
                                placeholder="Sesuai dengan yang terdapat di Kartu Keluarga atau Kartu Tanda Penduduk">
                            @error('nik_ibu')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="alamat_ibu">Alamat Ibu</label>
                            <textarea class="form-control" name="alamat_ibu" id="alamat_ibu" cols="15" rows="3" required
                                @error('alamat_ibu') is-invalid @enderror value="{{ $pendaftar->nama_ibu }}"
                                placeholder="Masukkan nomor, jalan, gang tempat tinggal sekarang">{{ $pendaftar->alamat_ibu }}</textarea>
                            @error('alamat_ibu')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="pendidikan_terakhir_ibu">Pendidikan Terakhir ibu</label>
                            <select class="form-control" name="pendidikan_terakhir_ibu" id="pendidikan_terakhir_ibu">
                                <option value="">Pilih pendidikan</option>
                                @foreach ($pendidikan as $item)
                                    <option
                                        {{ $pendaftar->pendidikan_terakhir_ibu == $item->pendidikan_id ? 'selected' : '' }}
                                        value="{{ $item->pendidikan_id }}">{{ $item->pendidikan }}</option>
                                @endforeach
                            </select>
                            @error('pendidikan_terakhir_ibu')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="no_telp_ibu">No. Telepon ibu</label>
                            <input type="text"  maxlength="15" required class="form-control"
                                @error('no_telp_ibu') is-invalid @enderror name="no_telp_ibu" id="no_telp_ibu"
                                value="{{ $pendaftar->no_telp_ibu }}" placeholder="+6282345451234">
                            @error('no_telp_ibu')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan ibu</label>
                            <input type="text"  maxlength="50" required class="form-control"
                                @error('pekerjaan_ibu') is-invalid @enderror name="pekerjaan_ibu" id="pekerjaan_ibu"
                                value="{{ $pendaftar->pekerjaan_ibu }}"
                                placeholder="Wiraswasta/ Dosen/ Guru/ Yang Lain.">
                            @error('pekerjaan_ibu')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="penghasilan_ibu">Penghasilan ibu</label>
                            <select class="form-control" name="penghasilan_ibu" id="penghasilan_ibu">
                                <option value="">Pilih Penghasilan</option>
                                @foreach ($penghasilan as $item)
                                    <option {{ $pendaftar->penghasilan_ibu == $item->id ? 'selected' : '' }}
                                        value="{{ $item->id }}">{{ $item->range_nominal }}</option>
                                @endforeach
                            </select>
                            @error('penghasilan_ibu')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br><br>
                        <hr>
                        <div class="card">
                            <p style="padding: 0 15px"> Wali merupakan pihak yang bertanggung jawab atas biaya pendaftaran
                                dan administrasi Santri.</p>
                            <ol>
                                <li>Jika berupa Ayah, maka Pilih Ayah</li>
                                <li>Jika berupa Ibu, maka Pilih Ibu</li>
                                <li>Jika berupa yang lain, maka Pilih Wali</li>
                            </ol>
                        </div>
                        <label for="">Pilih Wali</label>
                        <select required onchange="Pilihwali(this)" class="form-control" name="pilihan_wali"
                            id="pilihan_wali" disabled>
                            <option value="ayah">Ayah</option>
                            <option value="ibu">Ibu</option>
                        </select>
                        <hr>
                        <div class="form-group">
                            <label for="nama_wali">Nama Wali</label>
                            <input readonly type="text"  maxlength="50" required class="form-control"
                                @error('nama_wali') is-invalid @enderror name="nama_wali" id="nama_wali"
                                value="{{ $pendaftar->nama_wali }}"
                                placeholder="Nama sesuai dengan KTP, akta kelahiran, Kartu Keluarga">
                            @error('nama_wali')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik_wali">NIK Wali</label>
                            <input readonly type="text" maxlength="16" minlength="16"  required class="form-control"
                                @error('nik_wali') is-invalid @enderror name="nik_wali" id="nik_wali"
                                value="{{ $pendaftar->nik_wali }}" placeholder="Silakan ketik">
                            @error('nik_wali')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pendidikan_terakhir_wali">Pendidikan Terakhir Wali</label>
                            <select readonly class="form-control" name="pendidikan_terakhir_wali"
                                id="pendidikan_terakhir_wali">
                                <option value="">Pilih pendidikan</option>
                                @foreach ($pendidikan as $item)
                                    <option
                                        {{ $pendaftar->pendidikan_terakhir_wali == $item->pendidikan_id ? 'selected' : '' }}
                                        value="{{ $item->pendidikan_id }}">{{ $item->pendidikan }}</option>
                                @endforeach
                            </select>
                            @error('pendidikan_terakhir_wali')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="alamat_wali">Alamat Wali</label>
                            <textarea readonly class="form-control" name="alamat_wali" id="alamat_wali" cols="15" rows="3" required
                                @error('alamat_wali') is-invalid @enderror value="{{ $pendaftar->nama_ibu }}"
                                placeholder="Masukkan nomor, jalan, gang tempat tinggal sekarang">{{ $pendaftar->alamat_wali }}</textarea>
                            @error('alamat_wali')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="no_telp_wali">No. Telepon Wali</label>
                            <input readonly type="text" maxlength="15"  required class="form-control"
                                @error('no_telp_wali') is-invalid @enderror name="no_telp_wali" id="no_telp_wali"
                                value="{{ $pendaftar->no_telp_wali }}" placeholder="+6282345451234">
                            @error('no_telp_wali')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan_wali">Pekerjaan Wali</label>
                            <input readonly type="text"  maxlength="50" required class="form-control"
                                @error('pekerjaan_wali') is-invalid @enderror name="pekerjaan_wali" id="pekerjaan_wali"
                                value="{{ $pendaftar->pekerjaan_wali }}"
                                placeholder="Wiraswasta/ Dosen/ Guru/ Yang Lain.">
                            @error('pekerjaan_wali')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="penghasilan_wali">Penghasilan Wali</label>
                            <select readonly class="form-control" name="penghasilan_wali" id="penghasilan_wali">
                                <option value="">Pilih Range Penghasilan</option>
                                @foreach ($penghasilan as $item)
                                    <option {{ $pendaftar->penghasilan_wali == $item->id ? 'selected' : '' }}
                                        value="{{ $item->id }}">{{ $item->range_nominal }}</option>
                                @endforeach
                            </select>

                            @error('penghasilan_wali')
                                <div class="alert alert-danger text-danger">{{ $message }}</div>
                            @enderror
                        </div><br><br>
                        <button type="submit" class="btn btn-sm btn-color-theme">Selanjutnya</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascripts')
    <script>
        var $option = $("<option selected>wali</option>").val('wali');
        $('#pilihan_wali').append($option).trigger('change').attr("disabled", false)

        function Pilihwali(data) {
            console.log(data.value);
            const value = data.value;
            let pendidikan_ayah;
            let penghasilan;
            if (value == 'ayah') {
                alert('Anda memilih Ayah');
                pendidikan_ayah = $("#pendidikan_terakhir_ayah option:selected").val();
                $("#pendidikan_terakhir_wali").val(pendidikan_ayah).trigger("change");
                penghasilan = $("#penghasilan_ayah option:selected").val();
                $("#penghasilan_wali").val(penghasilan).trigger("change");
                $('#nama_wali').val($('#nama_ayah').val());
                $('#nik_wali').val($('#nik_ayah').val());
                $('#no_telp_wali').val($('#no_telp_ayah').val());
                $('#alamat_wali').val($('#alamat_ayah').val());
                $('#pekerjaan_wali').val($('#pekerjaan_ayah').val());
            } else if (value == 'ibu') {
                alert('Anda memilih Ibu');

                $('#alamat_wali').val($('#alamat_ibu').val());
                pendidikan_ayah = $("#pendidikan_terakhir_ibu option:selected").val();
                $("#pendidikan_terakhir_wali").val(pendidikan_ayah).trigger("change");
                penghasilan = $("#penghasilan_ibu option:selected").val();
                $("#penghasilan_wali").val(penghasilan).trigger("change");
                $('#nama_wali').val($('#nama_ibu').val());
                $('#nik_wali').val($('#nik_ibu').val());
                $('#no_telp_wali').val($('#no_telp_ibu').val());
                $('#pekerjaan_wali').val($('#pekerjaan_ibu').val());
            } else {
                alert('Anda memilih Wali');
                $('#nama_wali').val('').attr('readonly', false);
                $('#alamat_wali').val('').attr('readonly', false);
                $('#nik_wali').val('').attr('readonly', false);
                $('#no_telp_wali').val('').attr('readonly', false);
                $('#pekerjaan_wali').val('').attr('readonly', false);
                $('#penghasilan_wali').val('').attr('readonly', false);
                $('#pendidikan_terakhir_wali').val('').attr('readonly', false);
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
