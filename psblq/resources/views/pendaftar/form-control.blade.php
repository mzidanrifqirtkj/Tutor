<h1>FORMULIR PENDAFTARAN SANTRI BARU PONDOK PESANTREN SALAF API AL LUQMANIYYAH YOGYAKARTA</h1>
<h3>Persyaratan Umum:</h3>
<ul>
    <li>Usia Minimal 15 Tahun</li>
    <li>Belum Berkeluarga</li>
</ul>
<h3>Persyaratan Berkas File yand diupload</h3>
<ul>
    <li>Foto Pribadi 3 x 4</li>
    <li>Foto Kartu Keluarga</li>
</ul>

<h2>Form Pendaftaran Santri Baru</h2>
<div class="form-group">
    <label for="pendaftar_name">Nama Lengkap</label>
    <input type="text" data-required class="form-control  @error('pendaftar') is-invalid @enderror" name="nama"
        id="nama" value="{{ old('pendaftar') }}" placeholder="Silakan ketik">
    @error('pendaftar')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="nik">NIK</label>
    <input type="text" data-required class="form-control  @error('nik') is-invalid @enderror" name="nik"
        id="nik" value="{{ old('nik') }}" placeholder="Silakan ketik">
    @error('nik')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="no_kk">No. KK</label>
    <input type="text" data-required class="form-control  @error('no_kk') is-invalid @enderror" name="no_kk"
        id="no_kk" value="{{ old('no_kk') }}" placeholder="Silakan ketik">
    @error('no_kk')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="no_kk">Jenis Kelamin</label>
    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
        <option value="">Pilih Jenis Kelamin</option>
        <option value="L">Laki-Laki</option>
        <option value="P">Perempuan</option>
    </select>
</div>

<div class="form-group">
    <label for="tempat_lahir">Tempat Lahir</label>
    <input type="text" data-required class="form-control  @error('tempat_lahir') is-invalid @enderror"
        name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Silakan ketik">
    @error('tempat_lahir')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="tanggal_lahir">Tanggal Lahir</label>
    <input type="date" data-required class="form-control  @error('tanggal_lahir') is-invalid @enderror"
        name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="Silakan ketik">
    @error('tanggal_lahir')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>


<div class="form-group">
    <label for="nisn">NISN</label>
    <input type="text" data-required class="form-control  @error('nisn') is-invalid @enderror" name="nisn"
        id="nisn" value="{{ old('nisn') }}" placeholder="Silakan ketik">
    @error('nisn')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="no_telp">No. Telepon</label>
    <input type="text" data-required class="form-control  @error('no_telp') is-invalid @enderror" name="no_telp"
        id="no_telp" value="{{ old('no_telp') }}" placeholder="Silakan ketik">
    @error('no_telp')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>

#Alamat RT >>>

<div class="form-group">
    <label for="alamat">Alamat Lengkap</label>
    <input type="text" data-required class="form-control  @error('alamat') is-invalid @enderror" name="alamat"
        id="alamat" value="{{ old('alamat') }}" placeholder="Silakan ketik">
    @error('alamat')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="kode_pos">Kode Pos</label>
    <input type="text" data-required class="form-control  @error('kode_pos') is-invalid @enderror" name="kode_pos"
        id="kode_pos" value="{{ old('kode_pos') }}" placeholder="Silakan ketik">
    @error('kode_pos')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>

#Golongan darah

<div class="form-group">
    <label for="pendidikan_terakhir">Pendidikan Formal Terakhir</label>
    <input type="text" data-required class="form-control  @error('pendidikan_terakhir') is-invalid @enderror"
        name="pendidikan_terakhir" id="pendidikan_terakhir" value="{{ old('pendidikan_terakhir') }}"
        placeholder="Silakan ketik">
    @error('pendidikan_terakhir')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>

#Tahun Lulus

<div class="form-group">
    <label for="pendidikan_nonformal">Pendidikan NonFormal Sebelumnya</label>
    <input type="text" data-required class="form-control  @error('pendidikan_nonformal') is-invalid @enderror"
        name="pendidikan_nonformal" id="pendidikan_nonformal" value="{{ old('pendidikan_nonformal') }}"
        placeholder="Silakan ketik">
    @error('pendidikan_nonformal')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="organisasi">Organisasi yang Pernah diikuti</label>
    <input type="text" data-required class="form-control  @error('organisasi') is-invalid @enderror"
        name="organisasi" id="organisasi" value="{{ old('organisasi') }}" placeholder="Silakan ketik">
    @error('organisasi')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="jabatan">Jabatan di Organisasi yang Pernah diikuti</label>
    <input type="text" data-required class="form-control  @error('jabatan') is-invalid @enderror" name="jabatan"
        id="jabatan" value="{{ old('jabatan') }}" placeholder="Silakan ketik">
    @error('jabatan')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="pendidikan_terakhir">Pendidikan Formal Terakhir</label>
    <input type="text" data-required class="form-control  @error('pendidikan_terakhir') is-invalid @enderror"
        name="pendidikan_terakhir" id="pendidikan_terakhir" value="{{ old('pendidikan_terakhir') }}"
        placeholder="Silakan ketik">
    @error('pendidikan_terakhir')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="prestasi">Prestasi yang Pernah diraih</label>
    <input type="text" data-required class="form-control  @error('prestasi') is-invalid @enderror"
        name="prestasi" id="prestasi" value="{{ old('prestasi') }}" placeholder="Silakan ketik">
    @error('prestasi')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>


##Unggah Foto
{{-- <div class="form-group">
    <label for="gambar">Gambar</label>
    <input type="file" name="gambar" value="{{ old('gambar') ?? $data->gambar }}" id="gambar"
        class="form-control  @error('gambar') is-invalid @enderror">
    @error('gambar')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div> --}}

{{-- <form action="/tambah" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <b>File Gambar</b><br/>
        <input type="file" name="file">
    </div>

    <div class="form-group">
        <b>Keterangan</b>
        <textarea class="form-control" name="keterangan"></textarea>
    </div>

    {{-- <input type="submit" value="Upload" class="btn btn-primary"> --}}
{{-- </form> --}} --}}

{{-- <h4 class="my-5">Data</h4>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width="1%">File</th>
            <th>Keterangan</th>
            <th width="1%">OPSI</th>
        </tr>
    </thead>
    {{-- <tbody>
        @foreach ($data as $g)
        <tr>
            <td><img width="150px" src="{{ url('/data_file/'.$g->file) }}"></td>
            <td>{{$g->keterangan}}</td>
            {{-- <td><a class="btn btn-danger" href="/upload/hapus/{{ $g->id }}">HAPUS</a></td> --}}
{{-- </tr> --}}
{{-- @endforeach --}}
{{-- </tbody> --}} --}}
{{-- </table> --}} --}}
<div class="mb-3">
    <label for="gambar" class="form-label">Foto</label>
    <input class="form-control" type="file" id="gambar" name="gambar">
</div>


##No.KIP
##NO. KKS
##NO. PKH

##Garis

<div class="form-group">
    <label for="nama_ayah">Nama Ayah</label>
    <input type="text" data-required class="form-control  @error('nama_ayah') is-invalid @enderror"
        name="nama_ayah" id="nama_ayah" value="{{ old('nama_ayah') }}" placeholder="Silakan ketik">
    @error('nama_ayah')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="nik_ayah">NIK Ayah</label>
    <input type="text" data-required class="form-control  @error('nik_ayah') is-invalid @enderror"
        name="nik_ayah" id="nik_ayah" value="{{ old('nik_ayah') }}" placeholder="Silakan ketik">
    @error('nik_ayah')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="pendidikan_terakhir_ayah">Pendidikan Terakhir Ayah</label>
    <input type="text" data-required class="form-control  @error('pendidikan_terakhir_ayah') is-invalid @enderror"
        name="pendidikan_terakhir_ayah" id="pendidikan_terakhir_ayah" value="{{ old('pendidikan_terakhir_ayah') }}"
        placeholder="Silakan ketik">
    @error('pendidikan_terakhir_ayah')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="no_telepon_ayah">No. Telepon Ayah</label>
    <input type="text" data-required class="form-control  @error('no_telepon_ayah') is-invalid @enderror"
        name="no_telepon_ayah" id="no_telepon_ayah" value="{{ old('no_telepon_ayah') }}"
        placeholder="Silakan ketik">
    @error('no_telepon_ayah')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
    <input type="text" data-required class="form-control  @error('pekerjaan_ayah') is-invalid @enderror"
        name="pekerjaan_ayah" id="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" placeholder="Silakan ketik">
    @error('pekerjaan_ayah')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="penghasilan_ayah">Penghasilan Ayah</label>
    <input type="text" data-required class="form-control  @error('penghasilan_ayah') is-invalid @enderror"
        name="penghasilan_ayah" id="penghasilan_ayah" value="{{ old('penghasilan_ayah') }}"
        placeholder="Silakan ketik">
    @error('penghasilan_ayah')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>

##

<div class="form-group">
    <label for="nama_ibu">Nama Ibu</label>
    <input type="text" data-required class="form-control  @error('nama_ibu') is-invalid @enderror"
        name="nama_ibu" id="nama_ibu" value="{{ old('nama_ibu') }}" placeholder="Silakan ketik">
    @error('nama_ibu')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="nik_ibu">NIK Ibu</label>
    <input type="text" data-required class="form-control  @error('nik_ibu') is-invalid @enderror" name="nik_ibu"
        id="nik_ibu" value="{{ old('nik_ibu') }}" placeholder="Silakan ketik">
    @error('nik_ibu')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="pendidikan_terakhir_ibu">Pendidikan Terakhir Ibu</label>
    <input type="text" data-required class="form-control  @error('pendidikan_terakhir_ibu') is-invalid @enderror"
        name="pendidikan_terakhir_ibu" id="pendidikan_terakhir_ibu" value="{{ old('pendidikan_terakhir_ibu') }}"
        placeholder="Silakan ketik">
    @error('pendidikan_terakhir_ibu')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="no_telepon_ibu">No. Telepon Ibu</label>
    <input type="text" data-required class="form-control  @error('no_telepon_ibu') is-invalid @enderror"
        name="no_telepon_ibu" id="no_telepon_ibu" value="{{ old('no_telepon_ibu') }}" placeholder="Silakan ketik">
    @error('no_telepon_ibu')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
    <input type="text" data-required class="form-control  @error('pekerjaan_ibu') is-invalid @enderror"
        name="pekerjaan_ibu" id="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" placeholder="Silakan ketik">
    @error('pekerjaan_ibu')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="penghasilan_ibu">Penghasilan Ibu</label>
    <input type="text" data-required class="form-control  @error('penghasilan_ibu') is-invalid @enderror"
        name="penghasilan_ibu" id="penghasilan_ibu" value="{{ old('penghasilan_ibu') }}"
        placeholder="Silakan ketik">
    @error('penghasilan_ibu')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>

##

<div class="form-group">
    <label for="nama_wali">Nama Wali</label>
    <input type="text" data-required class="form-control  @error('nama_wali') is-invalid @enderror"
        name="nama_wali" id="nama_wali" value="{{ old('nama_wali') }}" placeholder="Silakan ketik">
    @error('nama_wali')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="nik_wali">NIK Wali</label>
    <input type="text" data-required class="form-control  @error('nik_wali') is-invalid @enderror"
        name="nik_wali" id="nik_wali" value="{{ old('nik_wali') }}" placeholder="Silakan ketik">
    @error('nik_wali')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="pendidikan_terakhir_wali">Pendidikan Terakhir Wali</label>
    <input type="text" data-required class="form-control  @error('pendidikan_terakhir_wali') is-invalid @enderror"
        name="pendidikan_terakhir_wali" id="pendidikan_terakhir_wali" value="{{ old('pendidikan_terakhir_wali') }}"
        placeholder="Silakan ketik">
    @error('pendidikan_terakhir_wali')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="no_telepon_wali">No. Telepon Wali</label>
    <input type="text" data-required class="form-control  @error('no_telepon_wali') is-invalid @enderror"
        name="no_telepon_wali" id="no_telepon_wali" value="{{ old('no_telepon_wali') }}"
        placeholder="Silakan ketik">
    @error('no_telepon_wali')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="pekerjaan_wali">Pekerjaan Wali</label>
    <input type="text" data-required class="form-control  @error('pekerjaan_wali') is-invalid @enderror"
        name="pekerjaan_wali" id="pekerjaan_wali" value="{{ old('pekerjaan_wali') }}" placeholder="Silakan ketik">
    @error('pekerjaan_wali')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label for="penghasilan_wali">Penghasilan Wali</label>
    <input type="text" data-required class="form-control  @error('penghasilan_wali') is-invalid @enderror"
        name="penghasilan_wali" id="penghasilan_wali" value="{{ old('penghasilan_wali') }}"
        placeholder="Silakan ketik">
    @error('penghasilan_wali')
        <div class="alert alert-danger text-danger">{{ $message }}</div>
    @enderror
</div>
<button class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Simpan</button>
