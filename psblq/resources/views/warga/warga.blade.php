@extends('layouts.layout')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">

        <div class="card-body">
            <div class="row justify-content-center mb-5">
                <div class="row mb-4">
                    <div class="col">
                        <a class="btn btn-primary" href="{{url('warga/tambah_warga')}}">Tambah</a>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>RT</th>
                                <th>umur</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($warga as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama_warga}}</td>
                                <td>{{$item->jenis_kelamin}}</td>
                                <td>{{$item->rt_id}}</td>
                                <td>{{$item->umur}}</td>
                                <td><a href="{{url('warga/'.$item->warga_id.'/detail')}}" class="btn btn-outline-success"><i class="alert-circle"></i></a> </td>
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