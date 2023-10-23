@extends('layouts.layout')
@section('content')
<div class="p-3 mb-2 bg-white text-dark">
  <form action="" method="POST">
    @csrf
    <div class="mb-3">
      <label for="nama_warga">Nama Warga</label>
      <input required type="text" class="form-control" name="nama_warga" id="nama_warga" placeholder="Nama Warga">
    </div>
    <div class="mb-3">
      <label for="nik">NIK</label>
      <input required type="text" class="form-control" name="nik" id="nik" placeholder="NIK">
    </div>
    <div class="mb-3">
      <label for="no_kk">No KK</label>
      <input required type="text" class="form-control" name="no_kk" id="no_kk" placeholder="No KK">
    </div>
    <div class="form-group mb-3 row ">
      <div class="col-sm-10">
        <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin</label>
        <select required name="jenis_kelamin" id="jenis_kelamin" class="form-control">
          <option value="">Pilih Jenis Kelamin</option>
          <option value="p">Perempuan</option>
          <option value="l">Laki-laki</option>
        </select>
      </div>
    </div>
    <div class="mb-3 ">
      <label for="tempat_lahir">Tempat Lahir</label>
      <input required type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir">
    </div>
    <div class="mb-3">
      <label for="tanggal_lahir">Tanggal Lahir</label>
      <input required type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir">
    </div>
    <div class="form-group mb-3 row ">
      <div class="col-sm-10">
        <label for="id_agama" class="col-form-label">Paket</label>
        <select required name="id_agama" id="id_agama" class="form-control">
          <option value="">Pilih Agama</option>
          @foreach(agama() as $item)
          <option value="{{$item->id_agama}}">{{$item->nama_agama}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group  mb-3 row ">
      <div class="col-sm-10">
        <label for="pendidikan_id" class="col-form-label">Pendidikan</label>
        <select required name="pendidikan_id" id="pendidikan_id" class="form-control">
          <option value="">Pilih Pendidikan</option>
          @foreach(pendidikan() as $item)
          <option value="{{$item->pendidikan_id}}">{{$item->pendidikan}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="mb-3">
      <label for="golongan_darah">Golongan Darah</label>
      <input required type="text" class="form-control" name="golongan_darah" id="golongan_darah" placeholder="Golongan Darah">
    </div>
    <div class="form-group mb-3 row ">
      <div class="col-sm-10">
        <label for="status_kawin_id" class="col-form-label">Status Perkawinan</label>
        <select required name="status_kawin_id" id="status_kawin_id" class="form-control">
          <option value="">Pilih Status Perkawinan</option>
          @foreach(statuskawin() as $item)
          <option value="{{$item->status_kawin_id}}">{{$item->nama_status_kawin}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group mb-3 row ">
      <div class="col-sm-10">
        <label for="status_dalam_keluarga_id" class="col-form-label">Status Dalam Keluarga</label>
        <select required name="status_dalam_keluarga_id" id="status_dalam_keluarga_id" class="form-control">
          <option value="">Pilih Status Perkawinan</option>
          @foreach(statusdalamkeluarga() as $item)
          <option value="{{$item->status_dalam_keluarga_id}}">{{$item->nama}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="form-group mb-3 row ">
      <div class="col-sm-10">
        <label for="rt_id" class="col-form-label"> RT</label>
        <select required name="rt_id" id="rt_id" class="form-control">
          <option value="">Pilih RT</option>
          @foreach(rt() as $item)
          <option value="{{$item->rt_id}}">{{$item->rt}}</option>
          @endforeach
        </select>
      </div>
    </div>
    <div class="mb-3">
      <label for="email">Email</label>
      <input required type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>
    <div class="mb-3">
      <label for="umur">Umur</label>
      <input required type="number" class="form-control" name="umur" id="umur" placeholder="Umur">
    </div>
    <div class="form-group mt-4">
      <button type="submit" class="btn btn-success">Simpan</button>
    </div>
  </form>
</div>
@endsection
@section('javascripts')
@endsection